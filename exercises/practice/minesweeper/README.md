# Minesweeper

Add the numbers to a minesweeper board.

Minesweeper is a popular game where the user has to find the mines using
numeric hints that indicate how many mines are directly adjacent
(horizontally, vertically, diagonally) to a square.

In this exercise you have to create some code that counts the number of
mines adjacent to a square and transforms boards like this (where `*`
indicates a mine):

    +-----+
    | * * |
    |  *  |
    |  *  |
    |     |
    +-----+

into this:

    +-----+
    |1*3*1|
    |13*31|
    | 2*2 |
    | 111 |
    +-----+


## Running the tests

1. Go to the root of your PHP exercise directory, which is `<EXERCISM_WORKSPACE>/php`.
   To find the Exercism workspace run

        % exercism debug | grep Workspace

1. Get [PHPUnit] if you don't have it already.

        % wget --no-check-certificate https://phar.phpunit.de/phpunit.phar
        % chmod +x phpunit.phar

2. Execute the tests:

        % ./phpunit.phar minesweeper/minesweeper_test.php

[PHPUnit]: http://phpunit.de


## Submitting Incomplete Solutions
It's possible to submit an incomplete solution so you can see how others have completed the exercise.
