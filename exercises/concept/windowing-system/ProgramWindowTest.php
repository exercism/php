<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class ProgramWindowTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ProgramWindow.php';
        require_once 'Size.php';
        require_once 'Position.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('assert ProgramWindow has a $y property')]
    public function testHasPropertyY()
    {
        $reflector = new ReflectionClass(ProgramWindow::class);
        $this->assertHasProperty($reflector, 'y', [
            'has_type' => false,
            'has_default' => false
        ]);
    }

    /**
     * @task_id 1
     */
    #[TestDox('assert ProgramWindow has a $x property')]
    public function testHasPropertyX()
    {
        $reflector = new ReflectionClass(ProgramWindow::class);
        $this->assertHasProperty($reflector, 'x', [
            'has_type' => false,
            'has_default' => false
        ]);
    }

    /**
     * @task_id 1
     */
    #[TestDox('assert ProgramWindow has a $height property')]
    public function testHasPropertyHeight()
    {
        $reflector = new ReflectionClass(ProgramWindow::class);
        $this->assertHasProperty($reflector, 'height', [
            'has_type' => false,
            'has_default' => false
        ]);
    }

    /**
     * @task_id 1
     */
    #[TestDox('assert ProgramWindow has a $width property')]
    public function testHasPropertyWidth()
    {
        $reflector = new ReflectionClass(ProgramWindow::class);
        $this->assertHasProperty($reflector, 'width', [
            'has_type' => false,
            'has_default' => false
        ]);
    }

    /**
     * @task_id 2
     */
    #[TestDox('assert ProgramWindow has a constructor initial values')]
    public function testHasConstructorSettingInitialValues()
    {
        $window = new ProgramWindow();
        $this->assertEquals(0, $window->y);
        $this->assertEquals(0, $window->x);
        $this->assertEquals(600, $window->height);
        $this->assertEquals(800, $window->width);
    }

    /**
     * @task_id 3
     */
    #[TestDox('assert Position class exists, with constructor, properties')]
    public function testSizeHasConstructorSettingInitialValues()
    {
        $size = new Size(300, 700);
        $this->assertEquals(300, $size->height);
        $this->assertEquals(700, $size->width);
    }

    /**
     * @task_id 3
     */
    #[TestDox('assert ProgramWindow::resize function exists')]
    public function testProgramWindowResize()
    {
        $window = new ProgramWindow();
        $size = new Size(430, 2135);
        $window->resize($size);
        $this->assertEquals(430, $window->height);
        $this->assertEquals(2135, $window->width);
    }

    /**
     * @task_id 4
     */
    #[TestDox('assert Position class exists, with constructor, properties')]
    public function testPositionHasConstructorSettingInitialValues()
    {
        $position = new Position(30, 70);
        $this->assertEquals(30, $position->y);
        $this->assertEquals(70, $position->x);
    }

    /**
     * @task_id 4
     */
    #[TestDox('assert ProgramWindow::move function exists')]
    public function testProgramWindowMove()
    {
        $window = new ProgramWindow();
        $position = new Position(40, 235);
        $window->move($position);
        $this->assertEquals(40, $window->y);
        $this->assertEquals(235, $window->x);
    }

    private function assertHasProperty(
        ReflectionClass $class,
        string $name,
        array $assertions = []
    ) {
        $assertions = array_merge([
            'has_type' => false,
            'has_default_value' => false
        ], $assertions);

        try {
            $property = $class->getProperty($name);
        } catch (ReflectionException) {
            $this->fail(
                "Property '$name' missing from class '{$class->getName()}'"
            );
        };

        if ($assertions['has_type']) {
            $this->assertTrue($property->hasType());
        } else {
            $this->assertFalse(
                $property->hasType(),
                "Property '$name' should not have a type declared"
            );
        }

        if ($assertions['has_default_value']) {
            $this->assertTrue($property->hasDefaultValue());
        } else {
            if ($assertions['has_type'] === false) {
                $this->assertTrue($property->hasDefaultValue());
                $this->assertNull($property->getDefaultValue());
            } else {
                $this->assertFalse(
                    $property->hasDefaultValue(),
                    "Property '$name' should not have a default value declared"
                );
            }
        }
    }
}
