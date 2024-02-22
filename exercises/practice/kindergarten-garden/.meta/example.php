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
