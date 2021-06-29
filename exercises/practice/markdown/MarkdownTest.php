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

class MarkdownTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Markdown.php';
    }

    public function testParsingParagraph(): void
    {
        $this->assertEquals('<p>This will be a paragraph</p>', parseMarkdown('This will be a paragraph'));
    }

    public function testParsingItalics(): void
    {
        $this->assertEquals('<p><i>This will be italic</i></p>', parseMarkdown('_This will be italic_'));
    }

    public function testParsingBoldText(): void
    {
        $this->assertEquals('<p><em>This will be bold</em></p>', parseMarkdown('__This will be bold__'));
    }

    public function testMixedNormalItalicsAndBoldText(): void
    {
        $this->assertEquals('<p>This will <i>be</i> <em>mixed</em></p>', parseMarkdown('This will _be_ __mixed__'));
    }

    public function testWithH1Headerlevel(): void
    {
        $this->assertEquals('<h1>This will be an h1</h1>', parseMarkdown('# This will be an h1'));
    }

    public function testWithH2Headerlevel(): void
    {
        $this->assertEquals('<h2>This will be an h2</h2>', parseMarkdown('## This will be an h2'));
    }

    public function testWithH6Headerlevel(): void
    {
        $this->assertEquals('<h6>This will be an h6</h6>', parseMarkdown('###### This will be an h6'));
    }

    public function testUnorderedLists(): void
    {
        $this->assertEquals(
            '<ul><li><p>Item 1</p></li><li><p>Item 2</p></li></ul>',
            parseMarkdown("* Item 1\n* Item 2")
        );
    }

    public function testWithALittleBitOfEverything(): void
    {
        $this->assertEquals(
            '<h1>Header!</h1><ul><li><em>Bold Item</em></li><li><i>Italic Item</i></li></ul>',
            parseMarkdown("# Header!\n* __Bold Item__\n* _Italic Item_")
        );
    }
}
