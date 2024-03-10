<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData\TestCase;

class CanonicalData
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    /**
     * @param TestCase[] $testCases
     * @param string[] $comments
     */
    public function __construct(
        // TODO: The exercise key is not required
        public string $exercise,
        public array $testCases = [],
        public array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(object $rawData): ?self
    {
        if (empty(\get_object_vars($rawData))) {
            return null;
        }

        return new static('', unknown: $rawData);
    }

    public function toPhpCode(): string
    {
        return $this->asMultiLineComment([\json_encode($this->unknown)]);
    }

    private function asMultiLineComment(array $lines): string
    {
        return self::LF
            . '/* Unknown data:' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */' . self::LF
            ;
    }
}
