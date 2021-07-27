<?php

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

declare(strict_types=1);

class SimpleCipher
{
    public const LETTERS = "abcdefghijklmnopqrstuvwxyz";
    public string $key;

    public function __construct(string $key = null)
    {
        $key ??= $this->generateRandomKey();
        $this->keyIsValid($key);
        $this->key = $key;
    }

    public function encode(string $plainText): string
    {
        $shiftedLetters = '';

        for ($i = 0; $i < strlen($plainText); $i++) {
            $plainTextIndex = strpos(self::LETTERS, $plainText[$i]);
            $keyCharacter   = $this->key[$i % strlen($this->key)];
            $keyIndex       = strpos(self::LETTERS, $keyCharacter);
            $combinedIndex  = $plainTextIndex + $keyIndex;

            if ($combinedIndex >= strlen(self::LETTERS)) {
                $combinedIndex -= strlen(self::LETTERS);
            }

            $shiftedLetters .= self::LETTERS[$combinedIndex];
        }

        return $shiftedLetters;
    }

    public function decode(string $cipherText): string
    {
        $decryptedLetters = '';

        for ($i = 0; $i < strlen($cipherText); $i++) {
            $cipherTextIndex = strpos(self::LETTERS, $cipherText[$i]);
            $keyCharacter    = $this->key[$i % strlen($this->key)];
            $keyIndex        = strpos(self::LETTERS, $keyCharacter);
            $combinedIndex   = $cipherTextIndex - $keyIndex;

            if ($combinedIndex < 0) {
                $combinedIndex += strlen(self::LETTERS);
            }

            $decryptedLetters .= self::LETTERS[$combinedIndex];
        }

        return $decryptedLetters;
    }

    private function keyIsValid(string $key)
    {
        if (preg_match('/[A-Z]/', $key)) {
            throw new InvalidArgumentException('The key should not contain capital letters.');
        }

        if (preg_match('/[0-9]/', $key)) {
            throw new InvalidArgumentException('The key should not contain numbers.');
        }

        if (empty($key) && !is_null($key)) {
            throw new InvalidArgumentException('The key should not be an empty string.');
        }
    }

    private function generateRandomKey(): string
    {
        $cipherLetters = [];
        $letterCount   = strlen(self::LETTERS) - 1;

        for ($i = 0; $i < $letterCount; ++$i) {
            $cipherLetters[] = self::LETTERS[random_int(0, $letterCount)];
        }

        return implode('', $cipherLetters);
    }
}
