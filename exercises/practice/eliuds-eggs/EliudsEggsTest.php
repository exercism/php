<?php

declare(strict_types=1);

class EliudsEggsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'EliudsEggs.php';
    }

    /**
     * uuid: 559e789d-07d1-4422-9004-3b699f83bca3
     * @testdox 0 eggs
     */
    public function test0Eggs()
    {
        $eliudsEggs = new EliudsEggs();
        $this->assertEquals(0, $eliudsEggs->eggCount(0));
    }

    /**
     * uuid: 97223282-f71e-490c-92f0-b3ec9e275aba
     * @testdox 1 eggs
     */
    public function test1Eggs()
    {
        $eliudsEggs = new EliudsEggs();
        $this->assertEquals(1, $eliudsEggs->eggCount(16));
    }

    /**
     * uuid: 1f8fd18f-26e9-4144-9a0e-57cdfc4f4ff5
     * @testdox 4 eggs
     */
    public function test4Eggs()
    {
        $eliudsEggs = new EliudsEggs();
        $this->assertEquals(4, $eliudsEggs->eggCount(89));
    }

    /**
     * uuid: 0c18be92-a498-4ef2-bcbb-28ac4b06cb81
     * @testdox 13 eggs
     */
    public function test13Eggs()
    {
        $eliudsEggs = new EliudsEggs();
        $this->assertEquals(13, $eliudsEggs->eggCount(2000000000));
    }
}
