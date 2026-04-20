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

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Markdown.php';
    }

    /** uuid: e75c8103-a6b8-45d9-84ad-e68520545f6e */
    #[TestDox('parses normal text as a paragraph')]
    public function testParsingParagraph(): void
    {
        $this->assertEquals(
            "<p>This will be a paragraph</p>",
            parseMarkdown("This will be a paragraph")
        );
    }

     /** uuid: 69a4165d-9bf8-4dd7-bfdc-536eaca80a6a */
    #[TestDox('parsing italics')]
    public function testParsingItalics(): void
    {
        $this->assertEquals(
            "<p><em>This will be italic</em></p>",
            parseMarkdown("_This will be italic_")
        );
    }

     /** uuid: ec345a1d-db20-4569-a81a-172fe0cad8a1 */
    #[TestDox('parsing bold text')]
    public function testParsingBoldText(): void
    {
        $this->assertEquals(
            "<p><strong>This will be bold</strong></p>",
            parseMarkdown("__This will be bold__")
        );
    }

     /** uuid: 51164ed4-5641-4909-8fab-fbaa9d37d5a8 */
    #[TestDox('mixed normal, italics and bold text')]
    public function testMixedNormalItalicsAndBoldText(): void
    {
        $this->assertEquals(
            "<p>This will <em>be</em> <strong>mixed</strong></p>",
            parseMarkdown("This will _be_ __mixed__")
        );
    }

    /** uuid: ad85f60d-0edd-4c6a-a9b1-73e1c4790d15 */
    #[TestDox('with h1 header level')]
    public function testWithH1Headerlevel(): void
    {
        $this->assertEquals(
            "<h1>This will be an h1</h1>",
            parseMarkdown("# This will be an h1")
        );
    }

    /** uuid: d0f7a31f-6935-44ac-8a9a-1e8ab16af77f */
    #[TestDox('with h2 header level')]
    public function testWithH2Headerlevel(): void
    {
        $this->assertEquals(
            "<h2>This will be an h2</h2>",
            parseMarkdown("## This will be an h2")
        );
    }

    /** uuid: 9df3f500-0622-4696-81a7-d5babd9b5f49 */
    #[TestDox('with h3 header level')]
    public function testWithH3headerLevel(): void
    {
        $this->assertEquals(
            "<h3>This will be an h3</h3>",
            parseMarkdown("### This will be an h3")
        );
    }

    /** uuid: 50862777-a5e8-42e9-a3b8-4ba6fcd0ed03 */
    #[TestDox('with h4 header level')]
    public function testWithH4headerLevel(): void
    {
        $this->assertEquals(
            "<h4>This will be an h4</h4>",
            parseMarkdown("#### This will be an h4")
        );
    }

    /** uuid: ee1c23ac-4c86-4f2a-8b9c-403548d4ab82 */
    #[TestDox('with h5 header level')]
    public function testWithH5headerLevel(): void
    {
        $this->assertEquals(
            "<h5>This will be an h5</h5>",
            parseMarkdown("##### This will be an h5")
        );
    }

    /** uuid: 13b5f410-33f5-44f0-a6a7-cfd4ab74b5d5 */
    #[TestDox('with h6 header level')]
    public function testWithH6Headerlevel(): void
    {
        $this->assertEquals(
            "<h6>This will be an h6</h6>",
            parseMarkdown("###### This will be an h6")
        );
    }

    /** uuid: 81c0c4db-435e-4d77-860d-45afacdad810 */
    #[TestDox('h7 header level is a paragraph')]
    public function testH7HeaderIsAParagraph(): void
    {
        $this->assertEquals(
            "<p>####### This will not be an h7</p>",
            parseMarkdown("####### This will not be an h7")
        );
    }

    /** uuid: 25288a2b-8edc-45db-84cf-0b6c6ee034d6 */
    #[TestDox('unordered lists')]
    public function testUnorderedLists(): void
    {
        $this->assertEquals(
            "<ul><li>Item 1</li><li>Item 2</li></ul>",
            parseMarkdown("* Item 1\n* Item 2")
        );
    }

    /** uuid: 7bf92413-df8f-4de8-9184-b724f363c3da */
    #[TestDox('With a little bit of everything')]
    public function testWithALittleBitOfEverything(): void
    {
        $this->assertEquals(
            "<h1>Header!</h1><ul><li><strong>Bold Item</strong></li><li><em>Italic Item</em></li></ul>",
            parseMarkdown("# Header!\n* __Bold Item__\n* _Italic Item_")
        );
    }

    /** uuid: 0b3ed1ec-3991-4b8b-8518-5cb73d4a64fe */
    #[TestDox('with markdown symbols in the header text that should not be interpreted')]
    public function testMarkdownSymbolInHeaderText(): void
    {
        $this->assertEquals(
            "<h1>This is a header with # and * in the text</h1>",
            parseMarkdown("# This is a header with # and * in the text")
        );
    }
#
    /** uuid: 113a2e58-78de-4efa-90e9-20972224d759 */
    #[TestDox('with markdown symbols in the list item text that should not be interpreted')]
    public function testMarkdownSymbolInListItemText(): void
    {
        $this->assertEquals(
            "<ul><li>Item 1 with a # in the text</li><li>Item 2 with * in the text</li></ul>",
            parseMarkdown("* Item 1 with a # in the text\n* Item 2 with * in the text")
        );
    }
   /** uuid: e65e46e2-17b7-4216-b3ac-f44a1b9bcdb4 */
    #[TestDox('with markdown symbols in the paragraph text that should not be interpreted')]
    public function testMarkdownSymbolInParagraph(): void
    {
        $this->assertEquals(
            "<p>This is a paragraph with # and * in the text</p>",
            parseMarkdown("This is a paragraph with # and * in the text")
        );
    }

    /** uuid: f0bbbbde-0f52-4c0c-99ec-be4c60126dd4 */
    #[TestDox('unordered lists close properly with preceding and following lines')]
    public function testUnorderedListCloseProperlyWithPrecedingAndFollowingLines(): void
    {
        $this->assertEquals(
            "<h1>Start a list</h1><ul><li>Item 1</li><li>Item 2</li></ul><p>End a list</p>",
            parseMarkdown("# Start a list\n* Item 1\n* Item 2\nEnd a list")
        );
    }
}
