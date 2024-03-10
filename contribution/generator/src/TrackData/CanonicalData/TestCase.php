<?php

declare(strict_types=1);

namespace App\TrackData\CanonicalData;

use PhpParser\BuilderFactory;

class TestCase
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    public function __construct(
        public string $uuid,
        public string $description,
        public string $property,
        public object $input,
        public mixed $expected,
        public array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(object $rawData): ?self
    {
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

    public function asClassMethods(): array
    {
        $builderFactory = new BuilderFactory();

        $method = $builderFactory->method($this->testMethodName())
            ->makePublic()
            ->setReturnType('void')
            ->setDocComment($this->asDocBlock([
                'uuid: ' . $this->uuid,
                '@testdox ' . \ucfirst($this->description),
                '@test',
            ]))
            ->addStmt(
                $builderFactory->funcCall(
                    '$this->markTestSkipped',
                    [ 'This test has not been implemented yet.' ],
                )
            )
            ;

        return [ $method->getNode() ];
    }

    private function testMethodName(): string
    {
        $methodNameParts = \explode(' ', $this->description);
        $upperCasedParts = \array_map(
            fn ($part) => \ucfirst($part),
            $methodNameParts
        );

        return \lcfirst(\implode('', $upperCasedParts));
    }

    private function asDocBlock(array $lines): string
    {
        return self::LF
            . '/**' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */'
            ;
    }
}
