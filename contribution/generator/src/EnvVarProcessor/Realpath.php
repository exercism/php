<?php

declare(strict_types=1);

namespace App\EnvVarProcessor;

use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class Realpath implements EnvVarProcessorInterface
{
    public function getEnv(string $prefix, string $name, \Closure $getEnv): string
    {
        $env = $getEnv($name);

        return \realpath($env);
    }

    public static function getProvidedTypes(): array
    {
        return [
            'realpath' => 'string',
        ];
    }
}
