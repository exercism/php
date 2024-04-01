<?php

declare(strict_types=1);

namespace App\Tests;

use App\Command\GenerateTests;
use App\Configlet;
use App\Model\CanonicalData\CanonicalData;
use App\Model\CanonicalData\LabeledTest;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use PhpCollective\Toml\Exception\ParseException;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Twig\Error\Error as TwigError;

class GenerateTestsTest extends TestCase
{
    /**
     * @throws FilesystemException
     * @throws TwigError
     * @throws ParseException
     */
    public function testGenerate(): void
    {
        $basePath = 'practice/test-exercise';
        $exercise = new InMemoryFilesystemAdapter();
        $exerciseFs = new Filesystem($exercise);
        $exerciseFs->write($basePath . '/.meta/config.json', '{"files":{"test":["test.php"]}}');
        $exerciseFs->write($basePath . '/.meta/tests.toml', '');
        $exerciseFs->write(
            $basePath . '/test.php.twig',
            '<?php $a = {{ export(canonicalData.cases.0.input.a) }}; $b = "{{ testfn(canonicalData.cases.0.description) }}";',
        );
        $canonicalData = new CanonicalData('test-exercise', [
            new LabeledTest('uuid', 'this-Is_a test fn', 'prop', ['a' => [1, 2]], null),
        ]);

        $application = new GenerateTests(new Configlet('/tmp'), $exerciseFs);
        $success = $application->generate($basePath, false, $canonicalData, new NullLogger());

        static::assertTrue($success);
        static::assertSame('<?php $a = [1, 2]; $b = "testThisIsATestFn";', $exerciseFs->read($basePath . '/test.php'));
    }
}
