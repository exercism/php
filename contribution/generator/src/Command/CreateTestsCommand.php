<?php

declare(strict_types=1);

namespace App\Command;

use App\TestGenerator;
use App\TrackData\Exercise;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-tests',
    description: 'This will automatically create tests',
)]
class CreateTestsCommand extends Command
{
    public function __construct(
        private TestGenerator $testGenerator,
        private Exercise $exercise,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('exercise', InputArgument::REQUIRED, 'Exercise slug');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exerciseSlug = $input->getArgument('exercise');
        $this->exercise->forSlug($exerciseSlug);

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $exerciseSlug . ' in ' . $this->exercise->pathToExercise());

        \file_put_contents(
            // TODO: Make '$this->exercise->pathToTestFile()'
            $this->exercise->pathToExercise()
                . '/'
                . $this->inPascalCase($exerciseSlug)
                . 'Test.php',
            $this->testGenerator->createTestClassFor(
                $this->exercise->canonicalData(),
                // TODO: Make '$this->exercise->testFile()'
                $this->inPascalCase($exerciseSlug),
                // TODO: Make '$this->exercise->studentsFile()'
            ),
        );
        // TODO: Make '$this->exercise->pathToStudentsFile()'
        // TODO: Make '$this->testGenerator->studentsClassStubFor()'

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    private function inPascalCase(string $text): string
    {
        return \str_replace(" ", "", \ucwords(\str_replace("-", " ", $text)));
    }
}
