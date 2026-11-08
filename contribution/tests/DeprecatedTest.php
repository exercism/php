<?php

declare(strict_types=1);

namespace App\Tests;

use App\Command\Deprecated;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use function preg_match;
use function str_contains;

class DeprecatedTest extends TestCase
{
    /**
     * @param array<string, array{0: string, 1: string, 2: int, 3: bool}> $exercises [key => [directory, config, http_status, command_output]]
     * @throws FilesystemException
     * @throws TransportExceptionInterface
     */
    #[TestWith([[
        'lasagna' => ['concept', '{}', 404, false],
        'two-fer' => ['practice', '{}', 404, false],
    ]])]
    #[TestWith([[
        'lasagna' => ['concept', '{"status":"active"}', 404, false],
    ]])]
    #[TestWith([[
        'lasagna' => ['concept', '{"status":"active"}', 200, true],
        'two-fer' => ['practice', '{"status":"active"}', 200, true],
    ]])]
    #[TestWith([[
        'lasagna' => ['concept', '{"status":"deprecated"}', 200, false],
    ]])]
    public function testDeprecatedReport(array $exercises): void
    {
        $exercisesFs = new Filesystem(new InMemoryFilesystemAdapter());
        foreach ($exercises as $exercise => $meta) {
            $exercisesFs->write($meta[0] . '/' . $exercise . '/.meta/config.json', $meta[1]);
        }

        $responses = static function (string $_method, string $url, array $_options) use ($exercises): MockResponse {
            $matches = [];
            preg_match('#/blob/main/exercises/(.+)/.deprecated$#', $url, $matches);
            assert(array_key_exists(1, $matches) && array_key_exists($matches[1], $exercises), 'regex should match');
            $meta = $exercises[$matches[1]];

            return new MockResponse('', ['http_code' => $meta[2]]);
        };

        $deprecated = new Deprecated($exercisesFs, new MockHttpClient($responses));

        $input = new ArrayInput([]);
        $bufferedOutput = new BufferedOutput();
        $deprecated($input, $bufferedOutput);

        $output = $bufferedOutput->fetch();
        foreach ($exercises as $exercise => $meta) {
            static::assertEquals($meta[3], str_contains($output, $exercise));
        }
    }
}
