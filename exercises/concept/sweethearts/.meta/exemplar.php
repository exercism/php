<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return substr(trim($name), offset: 0, length: 1);
    }

    public function initial(string $name): string
    {
        $letter = strtoupper($this->firstLetter($name));
        return "$letter.";
    }

    public function initials(string $full_name): string
    {
        $names = explode(separator: ' ', string: trim($full_name), limit: 2);
        $first_initial = $this->initial($names[0]);
        $second_initial = $this->initial($names[1]);
        return "$first_initial $second_initial";
    }

    public function pair(
        string $first_sweetheart,
        string $second_sweetheart
    ): string {
        $first_initials = $this->initials($first_sweetheart);
        $second_initials = $this->initials($second_sweetheart);

        return <<<HEART
                 ******       ******
               **      **   **      **
             **         ** **         **
            **            *            **
            **                         **
            **     $first_initials  +  $second_initials     **
             **                       **
               **                   **
                 **               **
                   **           **
                     **       **
                       **   **
                         ***
                          *
            HEART;
    }
}

