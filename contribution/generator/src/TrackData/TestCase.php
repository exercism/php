<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\Item;

/**
 * Represents an Item, that is testing something with property(input) === expected
 */
class TestCase implements Item
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    public function __construct(
        private string $uuid,
        private string $description,
        private string $property,
        private object $input,
        private mixed $expected,
        private array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(mixed $rawData): ?Item
    {
        if (!\is_object($rawData))
            return null;

        $requiredProperties = [
            'uuid',
            'description',
            'property',
            'input',
            'expected',
        ];
        $actualProperties = \array_keys(\get_object_vars($rawData));
        $data = [];
        foreach ($requiredProperties as $requiredProperty) {
            if (!\in_array($requiredProperty, $actualProperties)) {
                return null;
            }
            $data[$requiredProperty] = $rawData->{$requiredProperty};
            unset($rawData->{$requiredProperty});
        }

        return new static(
            ...$data,
            unknown: empty(\get_object_vars($rawData)) ? null : $rawData,
        );
    }

    public function renderPhpCode(): string
    {
        return \sprintf(
            $this->template(),
            $this->testMethodName(),
            $this->renderUnknownData(),
            $this->indentTrailingLines(\var_export((array)$this->input, true)),
            $this->invocationReturnsValue()
                ? $this->renderAssignExpected()
                : $this->renderAssertionOnException()
                ,
            $this->uuid,
            \ucfirst($this->description),
            $this->property,
            $this->invocationReturnsValue()
                ? $this->renderAssertionOnExpected()
                : ''
                ,
        );
    }

    private function invocationReturnsValue(): bool
    {
        return !(
            \is_object($this->expected)
            && isset($this->expected->error)
            && gettype($this->expected->error) === 'string'
        );
    }

    /**
     * %1$s Method name
     * %2$s Unknow data
     * %3$s Input data
     * %4$s Expected data or exception
     * %5$s UUID
     * %6$s Testdox
     * %7$s Property (method to call)
     * %8$s Assertion on expected
     */
    private function template(): string
    {
        return \file_get_contents(__DIR__ . '/test-case.txt');
    }

    private function testMethodName(): string
    {
        $sanitizedDescription = \preg_replace('/\W+/', ' ', $this->description);

        $methodNameParts = \explode(' ', $sanitizedDescription);
        $upperCasedParts = \array_map(
            fn ($part) => \ucfirst($part),
            $methodNameParts
        );

        return \lcfirst(\implode('', $upperCasedParts));
    }

    private function renderUnknownData(): string
    {
        if ($this->unknown === null)
            return '';
        return 'Unknown data:' . self::LF
            . ' * ' . \json_encode($this->unknown) . self::LF
            . ' * ' . self::LF
            . ' * '
            ;
    }

    private function renderAssignExpected(): string
    {
        return $this->indentTrailingLines('$expected = ' . \var_export($this->expected, true));
    }

    private function renderAssertionOnExpected(): string
    {
        return
            '    ' . self::LF
            . '    $this->assertSame($expected, $actual);' . self::LF
            ;
    }

    private function renderAssertionOnException(): string
    {
        return $this->indentTrailingLines(
            '$this->expectException(\Exception::class);' . self::LF
            . '$this->expectExceptionMessage(\''
            . $this->expected->error
            . '\')'
        );
    }

    private function indentTrailingLines(string $lines): string
    {
        $indent = '    ';
        return \implode(self::LF . $indent, \explode(self::LF, $lines));
    }
}
