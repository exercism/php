<?php

namespace ExercismTest\Acronym;

use PHPUnit\Framework\TestCase;
use function Exercism\Acronym\acronym;

class AcronymTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once __DIR__ . '/../src/acronym.php';
    }

    /**
     * @param string $acroynm
     * @param string $meaning
     * @dataProvider acronymProvider
     */
    public function testAcronymLookup(string $acroynm, string $meaning) : void
    {
        $this->assertEquals($acroynm, acronym($meaning));
    }

    public function acronymProvider() : array
    {
        return [
            'basic title case' => ['PNG', 'Portable Network Graphics'],
            'lower case word'  => ['ROR', 'Ruby on Rails'],
            'camelCase'        => ['HTML', 'HyperText Markup Language'],
            'all-caps words'   => ['PHP', 'PHP: Hypertext Preprocessor'],
            'hyphenated'       => ['CMOS', 'Complementary metal-oxide semiconductor'],
        ];
    }

    // Additional points for making the following tests pass
    public function testOneWordIsNotAbbreviated() : void
    {
        $this->assertEmpty(acronym('Word'));
    }

    public function testUnicode() : void
    {
        $phrase = 'Специализированная процессорная часть';
        $this->assertEquals('СПЧ', acronym($phrase));
    }
}
