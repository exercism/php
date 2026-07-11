<?php

declare(strict_types=1);

class Tournament
{
    private string $header  = "Team                           | MP |  W |  D |  L |  P\n";
    private string $teamRow = "%s                               |%3d |%3d |%3d |%3d |%3d\n";

    public function tally(string $scores): string
    {
        if (!$scores) {
            return rtrim($this->header, "\n");
        }

        $teamTotals = $this->calculateTournamentTotals($scores);

        //Sort by points and then by name
        $points = array_column($teamTotals, 'points');
        $names  = array_column($teamTotals, 'name');
        array_multisort($points, SORT_DESC, $names, SORT_ASC, $teamTotals);

        $output = $this->formatResults($teamTotals);

        return rtrim($output, "\n");
    }

    private function calculateTournamentTotals(string $scores): array
    {
        $teamTotals = [];

        foreach (explode("\n", $scores) as $match) {
            [$homeTeam, $awayTeam, $result] = explode(';', $match);

            $teamTotals[$homeTeam] ??= $this->createTeamResult($homeTeam);
            $teamTotals[$awayTeam] ??= $this->createTeamResult($awayTeam);
            $teamTotals[$homeTeam]->games += 1;
            $teamTotals[$awayTeam]->games += 1;

            if ($result === 'win') {
                $teamTotals[$homeTeam]->points += 3;
                $teamTotals[$homeTeam]->wins += 1;
                $teamTotals[$awayTeam]->losses += 1;
            }

            if ($result === 'loss') {
                $teamTotals[$awayTeam]->points += 3;
                $teamTotals[$awayTeam]->wins += 1;
                $teamTotals[$homeTeam]->losses += 1;
            }

            if ($result === 'draw') {
                $teamTotals[$homeTeam]->points += 1;
                $teamTotals[$awayTeam]->points += 1;
                $teamTotals[$homeTeam]->draws += 1;
                $teamTotals[$awayTeam]->draws += 1;
            }
        }

        return $teamTotals;
    }

    private function formatResults(array $teamTotals): string
    {
        $output = $this->header;

        foreach ($teamTotals as $teamTally) {
            $teamOutput = sprintf(
                $this->teamRow,
                $teamTally->name,
                $teamTally->games,
                $teamTally->wins,
                $teamTally->draws,
                $teamTally->losses,
                $teamTally->points
            );

            //Remove the number of white spaces equal to the team name length so table is formatted correctly.
            $output .= substr_replace($teamOutput, '', strlen($teamTally->name), strlen($teamTally->name));
        }

        return $output;
    }

    private function createTeamResult(string $teamName): stdClass
    {
        $teamResult = new stdClass();
        $teamResult->name   = $teamName;
        $teamResult->wins   = 0;
        $teamResult->losses = 0;
        $teamResult->draws  = 0;
        $teamResult->points = 0;
        $teamResult->games  = 0;

        return $teamResult;
    }
}
