<?php

declare(strict_types=1);

namespace App\Command;

use App\TestGenerator;
use App\TrackData\PracticeExercise;
use RuntimeException;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'exercism:create-tests', description: 'This will automatically create tests')]
class CreateTestsCommand
{
    public function __construct(
        private string $trackRoot,
    ) {}

    /**
     * @throws RuntimeException
     */
    public function __invoke(
        #[Argument('Exercise slug')]
        string $exerciseSlug,
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $exercise = new PracticeExercise($this->trackRoot, $exerciseSlug);
        $testGenerator = new TestGenerator();

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $exerciseSlug . ' in ' . $exercise->pathToExercise());

        $written = \file_put_contents(
            // TODO(@mk-mxp): Make '$exercise->pathToTestFile()'
            $exercise->pathToExercise() . '/' . $this->inPascalCase($exerciseSlug) . 'Test.php',
            $testGenerator->createTestsFor($exercise->canonicalData(), $this->inPascalCase($exerciseSlug)),
        );
        if ($written === false) {
            throw new RuntimeException(
                'Cannot write exercise as '
                . $exercise->pathToExercise()
                . '. Create exercise with `bin/configlet create --practice-exercise <slug>` first or check access rights.',
            );
        }
        // TODO(@mk-mxp): Make '$exercise->pathToStudentsFile()'
        // TODO(@mk-mxp): Make '$testGenerator->studentsFileFor()'

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    private function inPascalCase(string $text): string
    {
        return \str_replace(' ', '', \ucwords(\str_replace('-', ' ', $text)));
    }
}
