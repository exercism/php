<?php

declare(strict_types=1);

namespace App\Command;

use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use function array_key_exists;
use function basename;
use function json_decode;
use function sort;

use const JSON_THROW_ON_ERROR;

#[AsCommand('exercism:deprecated', 'This command allows you to check for deprecated exercises...')]
readonly class Deprecated
{
    public function __construct(
        private Filesystem $exercises,
        private HttpClientInterface $githubSpecification,
    ) {}

    /**
     * @throws TransportExceptionInterface
     * @throws FilesystemException
     */
    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        // TODO(@homersimpsons): Add a `--fix` option to automatically mark the exercises as deprecated
        $io = new SymfonyStyle($input, $output);

        $exercises = $this->getExercises();
        $deprecatedExercises = [];
        foreach ($io->progressIterate($exercises) as $exercise) {
            $path = 'blob/main/exercises/' . $exercise . '/.deprecated';
            $response = $this->githubSpecification->request('HEAD', $path);
            if ($response->getStatusCode() !== 200) {
                continue;
            }

            $deprecatedExercises[] = $exercise;
        }

        if ($deprecatedExercises === []) {
            $io->success('No deprecated exercises found.');

            return Command::SUCCESS;
        }

        $io->warning('Deprecated exercises found, mark them as deprecated in "config.json":');
        $io->listing($deprecatedExercises);

        return Command::FAILURE;
    }

    /**
     * @return list<string>
     *
     * @throws FilesystemException
     */
    private function getExercises(): array
    {
        $exercises = [];
        foreach (['concept', 'practice'] as $category) {
            foreach ($this->exercises->listContents($category) as $exercise) {
                if ($exercise->isFile()) {
                    continue; // TODO(@homersimpsons): Move exercises/concept/bootstrap.sh to command
                }

                $exercisePath = $exercise->path();
                $configContent = $this->exercises->read($exercisePath . '/.meta/config.json');
                /** @var array{status?: string} $config https://exercism.org/docs/building/tracks/config-json#h-practice-exercises */
                $config = json_decode($configContent, true, flags: JSON_THROW_ON_ERROR);
                if (!array_key_exists('status', $config) || $config['status'] !== 'deprecated') {
                    $exercises[] = basename($exercisePath);
                }
            }
        }

        sort($exercises);

        return $exercises;
    }
}
