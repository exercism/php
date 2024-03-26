<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\InnerGroup;
use App\TrackData\Item;

class CanonicalData implements Item
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    /**
     * @param string[] $comments
     */
    public function __construct(
        private string $testClassName,
        private string $solutionFileName,
        private string $solutionClassName,
        private InnerGroup $cases,
        private array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(mixed $rawData): ?static
    {
        if (!\is_object($rawData))
            return null;

        $requiredProperties = [
            'testClassName',
            'solutionFileName',
            'solutionClassName',
        ];
        $actualProperties = \array_keys(\get_object_vars($rawData));
        $requiredData = [];
        foreach ($requiredProperties as $requiredProperty) {
            if (!(
                \in_array($requiredProperty, $actualProperties)
                && \is_string($rawData->{$requiredProperty})
            )) {
                return null;
            }
            $requiredData[$requiredProperty] = $rawData->{$requiredProperty};
            unset($rawData->{$requiredProperty});
        }

        $comments = $rawData->comments ?? [];
        unset($rawData->comments);

        // Ignore "exercise" key (not required)
        unset($rawData->exercise);

        $cases = InnerGroup::from($rawData->cases ?? []);
        unset($rawData->cases);

        return new static(
            ...$requiredData,
            cases: $cases,
            comments: $comments,
            unknown: empty(\get_object_vars($rawData)) ? null : $rawData,
        );
    }

    public function renderPhpCode(): string
    {
        return \sprintf(
            $this->template(),
            $this->renderUnknownData(),
            $this->renderTests(),
            $this->renderComments(),
            $this->testClassName,
            $this->solutionFileName,
            $this->solutionClassName,
        );
    }

    /**
     * %1$s Unknow data
     * %2$s Pre-rendered list of tests
     * %3$s Comments for DocBlock
     * %4$s Test class name
     * %5$s Solution file name
     * %6$s Solution class name
     */
    private function template(): string
    {
        return \file_get_contents(__DIR__ . '/canonical-data.txt');
    }

    private function renderUnknownData(): string
    {
        if ($this->unknown === null)
            return '';
        return $this->asMultiLineComment([\json_encode($this->unknown)]);
    }

    private function renderTests(): string
    {
        $tests = $this->cases->renderPhpCode();

        return empty($tests) ? '' : $this->indent($tests) . self::LF;
    }

    private function renderComments(): string
    {
        return empty($this->comments) ? '' : $this->forBlockComment([...$this->comments, '', '']);
    }

    private function forBlockComment(array $lines): string
    {
        return \implode(self::LF . ' * ', $lines);
    }

    private function asMultiLineComment(array $lines): string
    {
        return self::LF
            . '/* Unknown data:' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */' . self::LF
            ;
    }

    private function indent(string $lines): string
    {
        $toUnindent = [
            '    // {{{',
            '    // }}}',
        ];
        $unindented = [
            '// {{{',
            '// }}}',
        ];

        $indent = '    ';
        $indentedLines =
            $indent
            . \implode(self::LF . $indent, \explode(self::LF, $lines))
            ;

        $indentedLines = \str_replace($toUnindent, $unindented, $indentedLines);

        return $indentedLines;
    }
}
