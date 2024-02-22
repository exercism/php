<?php

declare(strict_types=1);

class KindergartenGarden
{
    private const STUDENTS = ['Alice', 'Bob', 'Charlie', 'David', 'Eve', 'Fred', 'Ginny', 'Harriet', 'Ileana', 'Joseph', 'Kincaid', 'Larry'];

    private $plantsMap = [
        'G' => 'grass',
        'C' => 'clover',
        'R' => 'radishes',
        'V' => 'violets',
    ];

    private $studentPlants = [];

    public function __construct(string $diagram)
    {
        $rows = explode("\n", $diagram);
        foreach ($rows as $row) {
            for ($i = 0, $iMax = strlen($row); $i < $iMax; $i += 2) {
                $student = (int)($i / 2);
                foreach (self::STUDENTS as $index => $name) {
                    if ($index === $student) {
                        $this->studentPlants[$name][] = $this->plantsMap[$row[$i]];
                        $this->studentPlants[$name][] = $this->plantsMap[$row[$i + 1]];
                        break;
                    }
                }
            }
        }
    }

    public function plants(string $student): array
    {
        return $this->studentPlants[$student] ?? [];
    }
}
