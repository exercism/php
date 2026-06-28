<?php

declare(strict_types=1);

class SwiftScheduling
{
    private const array QUARTER = [
        1 => 4,
        2 => 7,
        3 => 10,
        4 => 13
    ];

    public function __construct(private DateTime $meetingStart)
    {}

    public function deliveryDate(string $description): DateTime
    {
        switch ($description) {
            case 'NOW':
                return $this->convertNow($this->meetingStart);
            case 'ASAP':
                return $this->convertAsap($this->meetingStart);
            case 'EOW':
                return $this->convertEow($this->meetingStart);
            default:
                if (str_ends_with($description, "M")) {
                    return $this->convertVariableM($this->meetingStart, (int) substr($description, 0, -1));
                } elseif (str_starts_with($description, "Q")) {
                    return $this->convertVariableQ($this->meetingStart, (int) substr($description, 1,));
                } else {
                    throw new InvalidArgumentException('Unexpected $description');
                }
        }
    }

    private function convertNow(DateTime $meetingStart): DateTime
    {
        return $meetingStart->modify('+2 hours');
    }

    private function convertAsap(DateTime $meetingStart): DateTime
    {
        $meetingHour = (int) $meetingStart->format('H');

        return $meetingHour < 13
            ? $meetingStart->setTime(17, 0)
            : $meetingStart->setTime(13, 0)
                           ->modify('+1 day');
    }

    private function convertEow(DateTime $meetingStart): DateTime
    {
        $meetingDay = (int) $meetingStart->format('w');

        return $meetingDay === 1 || $meetingDay === 2 || $meetingDay === 3
            ? $meetingStart->modify("friday")
                           ->setTime(17, 0)
            : $meetingStart->modify("sunday")
                           ->setTime(20, 0);
    }

    private function convertVariableM(DateTime $meetingStart, int $dueMonth): DateTime
    {
        $meetingMonth = (int) $meetingStart->format('m');

        $meetingMonth < $dueMonth
            ? $meetingStart->setDate(
                (int) $meetingStart->format('Y'),
                $dueMonth,
                1
            )
            : $meetingStart->setDate(
                (int) $meetingStart->format('Y') + 1,
                $dueMonth,
                1
            );

        $meetingDay = (int) $meetingStart->format('w');

        return $meetingDay === 0 || $meetingDay === 6
            ? $meetingStart->modify("first weekday")
                           ->setTime(8, 0)
            : $meetingStart->setTime(8, 0);
    }

    private function convertVariableQ(DateTime $meetingStart, int $dueQuarter): DateTime
    {
        $meetingMonth   = (int) $meetingStart->format('m');
        $meetingQuarter = round(($meetingMonth + 2) / 3);

        $meetingStart->setDate(
            (int) $meetingStart->format('Y'),
            self::QUARTER[$dueQuarter],
            1
        );

        if ($meetingQuarter > $dueQuarter) {
            $meetingStart->modify('+1 year');
        }

        $meetingStart->modify("last weekday")
                     ->setTime(8, 0);

        return $meetingStart;
    }
}
