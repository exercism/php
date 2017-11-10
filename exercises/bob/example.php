<?php

class Bob
{
    /**
     * Respond to an input string
     *
     * @param string $str
     * @return string
     */
    public function respondTo($str)
    {
        $str = $this->prepareText($str);

        if ($this->isSilence($str)) {
            return "Fine. Be that way!";
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
    private function isAllCapitals($str)
    {
        return strtoupper($str) == $str;
    }

    /**
     * Test is the string contains characters
     *
     * The RegEx matches a single character belonging to the "letter" category
     * @link http://www.regular-expressions.info/unicode.html
     *
     * @param string $str
     * @return int
     */
    private function containsCharacters($str)
    {
        return preg_match('/\p{L}/', $str);
    }

    /**
     * Test if something is being shouted
     *
     * @param $str
     * @return bool
     */
    private function isYelling($str)
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
    private function isQuestion($str)
    {
        return preg_match('/\?$/', $str);
    }

    /**
     * Test if the string contains something Bob can respond to
     *
     * @param string $str
     * @return bool
     */
    private function isSilence($str)
    {
        return empty($str);
    }

    /**
     * Remove excessive white space and remove non-printing characters
     *
     * @param string $str
     * @return string
     */
    private function prepareText($str)
    {
        return trim($str);
    }
}
