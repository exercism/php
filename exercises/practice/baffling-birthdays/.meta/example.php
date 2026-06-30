<?php

declare(strict_types=1);

class BafflingBirthdays
{
    public function sharedBirthday(array $birthdates): bool
    {
        $shared = [];

        foreach ($birthdates as $birthdate) {
            $birthday = substr($birthdate, -5);

            if (isset($shared[$birthday])) {
                return true;
            }

            $shared[$birthday] = true;
        }

        return false;
    }

    public function randomBirthdates(int $number): array
    {
        $birthdates = [];
        $actualYear = (int) (new DateTime('now'))->format('Y');

        for ($i = 0; $i < $number; $i++) {
            $randomYear = rand(1900, $actualYear);

            if ($randomYear % 400 == 0 || ($randomYear % 4 == 0 && $randomYear % 100 != 0)) {
                $randomYear = $randomYear + 1;
            }

            $birthdates[] = (new DateTime())
                ->setDate(
                    $randomYear,
                    rand(1, 12),
                    rand(1, 31),
                )
                ->format("Y-m-d")
            ;
        }

        return $birthdates;
    }

    public function estimatedProbabilityOfSharedBirthday(int $groupSize): float
    {
        $runs  = 10000;
        $count = 0;

        for ($i = 0; $i <= $runs; $i++) {
            $count += $this->sharedBirthday($this->randomBirthdates($groupSize));
        }

        return ($count * 100) / $runs;
    }
}
