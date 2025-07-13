<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class LanguageListTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LanguageList.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('calling language_list without arguments, returns empty array')]
    public function testEmpty()
    {
        $language_list = language_list();
        $this->assertEquals([], $language_list);
    }

    /**
     * @task_id 2
     */
    #[TestDox('variadic call to language_list with 1 arg returns args')]
    public function testVariadicCallWithOne()
    {
        $language_list = language_list('c');
        $this->assertEquals(['c'], $language_list);
    }

    /**
     * @task_id 2
     */
    #[TestDox('variadic call to language_list with 2 arg returns args')]
    public function testVariadicCallWithTwo()
    {
        $language_list = language_list('c', 'cpp');
        $this->assertEquals(['c', 'cpp'], $language_list);
    }

    /**
     * @task_id 2
     */
    #[TestDox('variadic call to language_list with 2 arg returns args')]
    public function testVariadicCallWithThree()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $this->assertEquals(['c', 'cpp', 'php'], $language_list);
    }

    /**
     * @task_id 3
     */
    #[TestDox('push new languages to the back of the list')]
    public function testAddingToLanguageList()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pushed_list = add_to_language_list($language_list, 'java');
        $this->assertEquals(['c', 'cpp', 'php', 'java'], $pushed_list);
    }

    /**
     * @task_id 3
     */
    #[TestDox('when pushing, original is unchanged')]
    public function testAddingDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pushed_list = add_to_language_list($language_list, 'java');
        $this->assertNotEquals($language_list, $pushed_list);
    }

    /**
     * @task_id 4
     */
    #[TestDox('remove completed language from the front of the list')]
    public function testCompleteLanguageList()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pruned_list = prune_language_list($language_list);
        $this->assertEquals(['cpp', 'php'], $pruned_list);
    }

    /**
     * @task_id 4
     */
    #[TestDox('when pushing, original is unchanged')]
    public function testPruningDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $pruned_list = prune_language_list($language_list);
        $this->assertNotEquals($language_list, $pruned_list);
    }

    /**
     * @task_id 5
     */
    #[TestDox('index and return the first language')]
    public function testCurrentReturnsTheFirstLanguage()
    {
        $language_list = language_list('php');
        $current = current_language($language_list);
        $this->assertEquals('php', $current);
    }

    /**
     * @task_id 5
     */
    #[TestDox('when getting the first language, original is unchanged')]
    public function testGettingFirstDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        current_language($language_list);
        $this->assertEquals(['c', 'cpp', 'php'], $language_list);
    }

    /**
     * @task_id 6
     */
    #[TestDox('the count of the languages in the language list')]
    public function testLanguageListCount()
    {
        $language_list = language_list('c', 'cpp', 'php');
        $languages_count = language_list_length($language_list);
        $this->assertEquals(3, $languages_count);
    }

    /**
     * @task_id 6
     */
    #[TestDox('when getting the language count, original is unchanged')]
    public function testLanguageListCountDoesNotMutate()
    {
        $language_list = language_list('c', 'cpp', 'php');
        language_list_length($language_list);
        $this->assertCount(3, $language_list);
    }
}
