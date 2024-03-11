<?php

declare(strict_types=1);

namespace App\Command;

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
            $this->exercise->pathToTestFile(),
            $this->exercise->testFileContent(),
        );
        // TODO: Make '$this->exercise->pathToSolutionFile()'
        // TODO: Make '$this->exercise->solutionFileContent()'

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }
}
