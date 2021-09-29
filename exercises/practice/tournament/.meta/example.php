<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Tournament
{
    private string $header  = "Team                           | MP |  W |  D |  L |  P\n";
    private string $teamRow = "%s                               |  %d |  %d |  %d |  %d |  %d\n";

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
