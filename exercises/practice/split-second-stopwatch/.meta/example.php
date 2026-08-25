<?php

declare(strict_types=1);

class SplitSecondStopwatch
{
    public function __construct(
        private(set) string $state = "ready",
        private(set) int $total = 0,
        private(set) int $currentLap = 0,
        private(set) array $previousLaps = []
    ) {
    }

    public function advanceTime(string $duration): void
    {
        if ($this->state === 'running') {
            $seconds = $this->formatSeconds($duration);
            $this->currentLap += $seconds;
            $this->total += $seconds;
        }
    }

    private function formatTime(int $seconds): string
    {
        $hours = $seconds / 3600;
        $minutes = ($seconds % 3600) / 60;
        $seconds = $seconds % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }

    private function formatSeconds(string $duration): int
    {
        [$hours, $minutes, $seconds] = explode(':', $duration);

        return $hours * 3600 + $minutes * 60 + $seconds;
    }

    public function getCurrentLap(): string
    {
        return $this->formatTime($this->currentLap);
    }

    public function getTotal(): string
    {
        return $this->formatTime($this->total);
    }

    public function start(): void
    {
        if ($this->state === "running") {
            throw new Exception("Error: cannot start an already running stopwatch");
        }

        $this->state = "running";
    }

    public function stop(): void
    {
        if ($this->state !== "running") {
            throw new Exception("Error: cannot stop a stopwatch that is not running");
        }

        $this->state = "stopped";
    }

    public function lap(): void
    {
        if ($this->state !== "running") {
            throw new Exception("Error: cannot lap a stopwatch that is not running");
        }

        $this->previousLaps[] = $this->getCurrentLap();
        $this->currentLap = 0;
    }

    public function reset(): void
    {
        if ($this->state !== "stopped") {
            throw new Exception("Error: cannot reset a stopwatch that is not stopped");
        }

        $this->state = "ready";
        $this->currentLap = 0;
        $this->previousLaps = [];
    }
}
