<?php

require 'markdown.php';

class MarkdownTest extends PHPUnit\Framework\TestCase
{
    public function testParsingParagraph()
    {
        $this->assertEquals('<p>This will be a paragraph</p>', parseMarkdown('This will be a paragraph'));
    }

    public function testParsingItalics()
    {
        $this->assertEquals('<p><i>This will be italic</i></p>', parseMarkdown('_This will be italic_'));
    }

    public function testParsingBoldText()
    {
        $this->assertEquals('<p><em>This will be bold</em></p>', parseMarkdown('__This will be bold__'));
    }

    public function testMixedNormalItalicsAndBoldText()
    {
        $this->assertEquals('<p>This will <i>be</i> <em>mixed</em></p>', parseMarkdown('This will _be_ __mixed__'));
    }

    public function testWithH1Headerlevel()
    {
        $this->assertEquals('<h1>This will be an h1</h1>', parseMarkdown('# This will be an h1'));
    }

    public function testWithH2Headerlevel()
    {
        $this->assertEquals('<h2>This will be an h2</h2>', parseMarkdown('## This will be an h2'));
    }

    public function testWithH6Headerlevel()
    {
        $this->assertEquals('<h6>This will be an h6</h6>', parseMarkdown('###### This will be an h6'));
    }

    public function testUnorderedLists()
    {
        $this->assertEquals(
            '<ul><li><p>Item 1</p></li><li><p>Item 2</p></li></ul>',
            parseMarkdown("* Item 1\n* Item 2")
        );
    }

    public function testWithALittleBitOfEverything()
    {
        $this->assertEquals(
            '<h1>Header!</h1><ul><li><em>Bold Item</em></li><li><i>Italic Item</i></li></ul>',
            parseMarkdown("# Header!\n* __Bold Item__\n* _Italic Item_")
        );
    }
}
