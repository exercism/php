<?php

declare(strict_types=1);

namespace App\Tests;

use App\Application;
use League\Flysystem\Filesystem;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class ApplicationTest extends TestCase
{
    /**
     * @TODO Correct integration test
     */
    public function testGenerate(): void
    {
        $exercise = new InMemoryFilesystemAdapter();
        $exerciseFs = new Filesystem($exercise);
        $exerciseFs->write('.meta/config.json', '{"files":{"test":["test.php"]}}');
        $exerciseFs->write('.meta/tests.toml', '');
        $exerciseFs->write('test.php.twig', '<?php $a = {{ export(a) }}; $b = "{{ testfn(l) }}";');
        $canonicalData = ['a' => [1, 2], 'l' => 'this-Is_a test fn', 'cases' => []];

        $application = new Application();
        $success = $application->generate($exerciseFs, false, $canonicalData, new NullLogger());

        $this->assertTrue($success);
        $this->assertSame('<?php $a = [1, 2]; $b = "testThisIsATestFn";', $exerciseFs->read('/test.php'));
    }
}
