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

function recognize($ocr)
{
    return (new OcrBlock($ocr))->recognize();
}

class OcrBlock
{
    protected $ocr = [];

    public function __construct($ocr)
    {
        $this->ocr = $ocr;
        $this->validate();
    }

    /**
     * Validate OCR block format: size, proportions
     * @throws InvalidArgumentException
     */
    public function validate(): void
    {
        $numRows = count($this->ocr);
        $numColumns = strlen($this->ocr[0]);
        if (
            !$numRows
            || ($numRows % OcrSymbol::NUM_ROWS != 0)
            || !$numColumns
            || ($numColumns % OcrSymbol::NUM_COLUMNS != 0)
        ) {
            throw new InvalidArgumentException('Malformed OCR Input');
        }
        foreach ($this->ocr as $row) {
            if (strlen($row) != $numColumns) {
                throw new InvalidArgumentException('Malformed OCR Input');
            }
        }
    }

    /**
     * Recognize OCR block: split it into vertical fragments,
     * explode them into symbols and recognize them.
     * @return string
     */
    public function recognize(): string
    {
        return implode(',', array_map(function ($x) {
            return implode('', array_map(function ($y) {
                return (new OcrSymbol($y))->getDigit();
            }, $this->explode($x)));
        }, array_chunk($this->ocr, OcrSymbol::NUM_ROWS)));
    }

    /**
     * Explode OCR fragment into OCR symbols
     * @param array $ocrFragment
     * @return array
     */
    protected function explode($ocrFragment): array
    {
        $exploded = array_map(function ($x) {
            return str_split($x, OcrSymbol::NUM_COLUMNS);
        }, $ocrFragment);
        return array_map(function ($a, $b, $c, $d) {
            return [$a, $b, $c, $d];
        }, $exploded[0], $exploded[1], $exploded[2], $exploded[3]);
    }
}

class OcrSymbol
{
    public const NUM_ROWS = 4;
    public const NUM_COLUMNS = 3;

    protected $map = [
        'x_x|x||_|xxx' => '0',
        'xxxxx|xx|xxx' => '1',
        'x_xx_||_xxxx' => '2',
        'x_xx_|x_|xxx' => '3',
        'xxx|_|xx|xxx' => '4',
        'x_x|_xx_|xxx' => '5',
        'x_x|_x|_|xxx' => '6',
        'x_xxx|xx|xxx' => '7',
        'x_x|_||_|xxx' => '8',
        'x_x|_|x_|xxx' => '9',
    ];

    protected $ocr;
    protected $digit;

    public function __construct($ocr)
    {
        $this->ocr = $ocr;
    }

    /**
     * Translate OCR to digit
     * @return string
     */
    public function getDigit(): string
    {
        if ($this->digit === null) {
            $encoded = str_replace(' ', 'x', implode($this->ocr));
            $this->digit = array_key_exists($encoded, $this->map) ? $this->map[$encoded] : '?';
        }
        return $this->digit;
    }
}
