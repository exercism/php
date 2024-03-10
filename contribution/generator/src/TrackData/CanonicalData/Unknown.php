<?php

declare(strict_types=1);

namespace App\TrackData\CanonicalData;

use PhpParser\Comment\Doc;
use PhpParser\Node\Stmt\ClassMethod;

/**
 * Represents a 'cases' entry, that is not one of the known types
 */
class Unknown
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    private function __construct(
        private ?object $data = null,
    ) {
    }

    public static function from(object $rawData): self
    {
        return new static($rawData);
    }

    public function asAst(string $methodName): array
    {
        $method = new ClassMethod($methodName);
        $method->setDocComment(
            new Doc($this->asMultiLineComment([\json_encode($this->data)]))
        );

        return [ $method ];
    }

    private function asMultiLineComment(array $lines): string
    {
        return '/* Unknown data:' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */'
            ;
    }
}
