<?php

class LanguageListTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LanguageList.php';
    }

    /**
     * @testdox calling language_list without arguments, returns empty array
     * @task_id 1
     */
    public function testEmpty()
    {
        $language_list = language_list();
        $this->assertEquals([], $language_list);
    }

    /**
     * @testdox variadic call to language_list with 1 arg returns args
     * @task_id 2
     */
    public function testVariadicCallWithOne()
    {
        $language_list = language_list('c');
        $this->assertEquals(['c'], $language_list);
    }

    /**
     * @testdox variadic call to language_list with 2 arg returns args
     * @task_id 2
     */
    public function testVariadicCallWithTwo()
    {
        $language_list = language_list('c', 'cpp');
        $this->assertEquals(['c', 'cpp'], $language_list);
    }

    /**
     * @testdox variadic call to language_list with 2 arg returns args
     * @task_id 2
     */
    public function testVariadicCallWithThree()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $this->assertEquals(['c', 'cpp', 'php'], $language_list);
    }

    /**
     * @testdox push new languages to the back of the list
     * @task_id 3
     */
    public function testAddingToLanguageList()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pushed_list = add_to_language_list($language_list, 'java');
        $this->assertEquals(['c', 'cpp', 'php', 'java'], $pushed_list);
    }

    /**
     * @testdox when pushing, original is unchanged
     * @task_id 3
     */
    public function testAddingDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pushed_list = add_to_language_list($language_list, 'java');
        $this->assertNotEquals($language_list, $pushed_list);
    }

    /**
     * @testdox remove completed language from the front of the list
     * @task_id 4
     */
    public function testCompleteLanguageList()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pruned_list = prune_language_list($language_list);
        $this->assertEquals(['cpp', 'php'], $pruned_list);
    }

    /**
     * @testdox when pushing, original is unchanged
     * @task_id 4
     */
    public function testPruningDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pruned_list = prune_language_list($language_list);
        $this->assertNotEquals($language_list, $pruned_list);
    }

    /**
     * @testdox index and return the first language
     * @task_id 5
     */
    public function testCurrentReturnsTheFirstLanguage()
    {
        $language_list = language_list('php');
        $current = current_language($language_list);
        $this->assertEquals('php', $current);
    }

    /**
     * @testdox when getting the first language, original is unchanged
     * @task_id 5
     */
    public function testGettingFirstDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        current_language($language_list);
        $this->assertEquals(['c', 'cpp', 'php'], $language_list);
    }

    /**
     * @testdox the count of the languages in the language list
     * @task_id 6
     */
    public function testLanguageListCount()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $languages_count = language_list_length($language_list);
        $this->assertEquals(3, $languages_count);
    }

    /**
     * @testdox when getting the language count, original is unchanged
     * @task_id 6
     */
    public function testLanguageListCountDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        language_list_length($language_list);
        $this->assertCount(3, $language_list);
    }
}
