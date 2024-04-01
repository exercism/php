<?php

declare(strict_types=1);

namespace App;

use App\Model\CanonicalData\CanonicalData;
use RuntimeException;
use Symfony\Component\Process\Exception\RuntimeException as ProcessRuntimeException;
use Symfony\Component\Process\Process;

final class Configlet
{
    public function __construct(
        private string $configletPath,
    ) {}

    /**
     * @throws RuntimeException
     */
    private function cacheDirectory(): string
    {
        if (!(is_executable($this->configletPath) && is_file($this->configletPath))) {
            throw new RuntimeException(
                'Configlet path is not executable or not a file: '
                . $this->configletPath
                . '. Fetch it with `bin/fetch-configlet`.',
            );
        }

        $configlet = new Process([
            $this->configletPath,
            '--verbosity',
            'detailed',
            'info',
            '--offline',
        ], __DIR__ . '/../../');
        try {
            $configlet->mustRun();
        } catch (ProcessRuntimeException $exception) {
            throw new RuntimeException('Configlet command failed', previous: $exception);
        }

        $infoOutput = $configlet->getOutput();
        $matches = [];
        preg_match('/^Using cached \'problem-specifications\' dir: (.+)\n/', $infoOutput, $matches);
        if (!array_key_exists(1, $matches)) {
            throw new RuntimeException('Failed to parse cache directory from configlet output');
        }

        return $matches[1];
    }

    /**
     * @throws RuntimeException
     */
    public function canonicalDataRaw(string $exerciseSlug): string
    {
        $canonicalDataPath = \sprintf(
            '%1$s/exercises/%2$s/canonical-data.json',
            $this->cacheDirectory(),
            $exerciseSlug,
        );

        $canonicalData = \file_get_contents($canonicalDataPath);
        if ($canonicalData === false) {
            throw new RuntimeException('Failed to read canonical data ' . $canonicalDataPath);
        }

        return $canonicalData;
    }

    /**
     * @throws RuntimeException
     */
    public function canonicalData(string $exerciseSlug): CanonicalData
    {
        $canonicalDataRaw = $this->canonicalDataRaw($exerciseSlug);
        /** @var array $canonicalDataJson */
        $canonicalDataJson = json_decode($canonicalDataRaw, true, flags: JSON_THROW_ON_ERROR);

        return CanonicalData::from($canonicalDataJson);
    }
}
