<?php

declare(strict_types=1);

namespace App\Command;

use App\TestGenerator;
use App\TrackData\PracticeExercise;
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
    private string $trackRoot;

    public function __construct(
        private string $projectDir,
    ) {
        $this->trackRoot = realpath($projectDir . '/../..');

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('exercise', InputArgument::REQUIRED, 'Exercise slug');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exerciseSlug = $input->getArgument('exercise');
        $exercise = new PracticeExercise(
            $this->trackRoot,
            $exerciseSlug,
        );
        $testGenerator = new TestGenerator($exerciseSlug);

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $exerciseSlug . ' in ' . $exercise->pathToExercise());

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }
}
