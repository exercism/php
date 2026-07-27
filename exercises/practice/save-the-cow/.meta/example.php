<?php

declare(strict_types=1);

class SaveTheCow
{
    public function __construct(
        private string $word,
        private array $maskedWord = [],
        public string $state = "Ongoing",
        public int $remainingFailures = 9
    ) {
        $this->maskedWord = str_split(str_repeat("_", strlen($word)));
    }

    public function guess(array $guesses): void
    {
        foreach ($guesses as $guess) {
            if ($this->state === "Win") {
                throw new Exception("cannot guess after the game is won");
            } else if ($this->state === "Lose") {
                throw new Exception("cannot guess after the game is lost");
            }

            if (str_contains($this->word, $guess) && ! str_contains(implode("", $this->maskedWord), $guess)) {
                for ($i = 0; $i < strlen($this->word); $i++) {
                    if ($this->word[$i] === $guess) {
                        $this->maskedWord[$i] = $guess;
                    }
                }
                if (! str_contains(implode("", $this->maskedWord), "_")) {
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

    public function maskedWord(): string
    {
        return implode("", $this->maskedWord);
    }
}
