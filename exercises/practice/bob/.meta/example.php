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

class Bob
{
    /**
     * Respond to an input string
     *
     * @param string $str
     * @return string
     */
    public function respondTo($str): string
    {
        $str = $this->prepareText($str);

        if ($this->isSilence($str)) {
            return "Fine. Be that way!";
        }

        if ($this->isYelling($str) && $this->isQuestion($str)) {
            return "Calm down, I know what I'm doing!";
        }

        if ($this->isYelling($str)) {
            return "Whoa, chill out!";
        }

        if ($this->isQuestion($str)) {
            return "Sure.";
        }

        return "Whatever.";
    }

    /**
     * Test if the string is being yelled
     *
     * @param string $str
     * @return bool
     */
    private function isAllCapitals($str): bool
    {
        return strtoupper($str) == $str;
    }

    /**
     * Test is the string contains characters
     *
     * The RegEx matches a single character belonging to the "letter" category
     * @link https://www.regular-expressions.info/unicode.html
     *
     * @param string $str
     * @return int
     */
    private function containsCharacters($str): int
    {
        return preg_match('/\p{L}/', $str);
    }

    /**
     * Test if something is being shouted
     *
     * @param $str
     * @return bool
     */
    private function isYelling($str): bool
    {
        return $this->containsCharacters($str) && $this->isAllCapitals($str);
    }

    /**
     * Test if the string is a question
     *
     * The RegEx looks for a question mark at the end of the sentence
     *
     * @param string $str
     * @return int
     */
    private function isQuestion($str): int
    {
        return preg_match('/\?$/', $str);
    }

    /**
     * Test if the string contains something Bob can respond to
     *
     * @param string $str
     * @return bool
     */
    private function isSilence($str): bool
    {
        return empty($str);
    }

    /**
     * Remove excessive white space and remove non-printing characters
     *
     * @param string $str
     * @return string
     */
    private function prepareText($str): string
    {
        return trim($str);
    }
}
