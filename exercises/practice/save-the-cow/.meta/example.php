<?php

declare(strict_types=1);

class SaveTheCow
{
    public function __construct(
        private string $word,
        public string $maskedWord = "",
        public string $state = "Ongoing",
        public int $remainingFailures = 9
    ) {
        $this->maskedWord = str_repeat("_", strlen($word));
    }

    public function guess(string $guess): void
    {
        if ($this->state === "Win") {
            throw new Exception("cannot guess after the game is won");
        } else if ($this->state === "Lose") {
            throw new Exception("cannot guess after the game is lost");
        }

        if (str_contains($this->word, $guess) && ! str_contains($this->maskedWord, $guess)) {
            for ($i = 0; $i < strlen($this->word); $i++) {
                if ($this->word[$i] === $guess) {
                    $this->maskedWord[$i] = $guess;
                }
            }
            if (! str_contains($this->maskedWord, "_")) {
                $this->state = "Win";
            }
        } else {
            if ($this->remainingFailures === 0) {
                $this->state = "Lose";
            } else {
                $this->remainingFailures--;
            }
        }
    }
}
