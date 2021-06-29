<?php

declare(strict_types=1);

namespace Exercism\Sniffs;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Fixer;
use PHP_CodeSniffer\Sniffs\Sniff;

class ExplainStrictTypesSniff implements Sniff
{
    private static string $explanation = <<<EOT
/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */
EOT;

    private ?Fixer $fixer = null;
    private int $position = 0;

    private array $tokens = [
        T_COMMENT,
    ];

    public function register(): array
    {
        return [
            T_DECLARE,
        ];
    }

    public function process(File $file, $stackPtr)
    {
        $this->fixer = $file->fixer;
        $this->position = $stackPtr;

        if (!$file->findPrevious($this->tokens, $stackPtr)) {
            $file->addFixableError(
                'Missing explanation of declaration of strict types.',
                $stackPtr - 1,
                self::class
            );
            $this->fix();
        }
    }

    private function fix(): void
    {
        $this->fixer->addContent($this->position - 1, self::$explanation);
    }
}
