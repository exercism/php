<?php

declare(strict_types=1);

namespace App;

use function explode;
use function intval;
use function is_numeric;
use function str_ends_with;
use function str_starts_with;
use function strtolower;
use function substr;
use function trim;

/**
 * A really basic TOML parser that handles enough of the syntax used by Exercism
 *
 * @see https://toml.io/en/v1.0.0
 */
class TomlParser
{
    public static function parse(string $tomlString): array
    {
        $lines = explode("\n", $tomlString);
        $data = [];
        $currentTable = null;

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip empty lines and comments
            if (empty($line) || $line[0] === '#') {
                continue;
            }

            // Check for table declaration
            if (str_starts_with($line, '[')) {
                $tableName = trim(substr($line, 1, -1));
                if (! isset($data[$tableName])) {
                    $data[$tableName] = [];
                }

                $currentTable = &$data[$tableName];
                continue;
            }

            // @TODO Handle quoted keys, handle doted keys
            // Parse key-value pair
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            // @TODO: Handle multi-line string, literal string and multi-line literal string
            if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
                // Handle quoted strings
                $value = substr($value, 1, -1);
            } elseif (is_numeric($value)) {
                // Handle integer
                $value = intval($value);
            } elseif (strtolower($value) === 'true') {
                // Handle boolean true
                $value = true;
            } elseif (strtolower($value) === 'false') {
                // Handle boolean false
                $value = false;
            }

            // Assign value to current table or root data
            if ($currentTable !== null) {
                $currentTable[$key] = $value;
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
