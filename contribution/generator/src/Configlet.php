<?php

declare(strict_types=1);

namespace App;

use RuntimeException;

class Configlet
{
    private string $pathToConfiglet = '';

    public function __construct(
        private string $trackRoot,
    ) {
        $this->pathToConfiglet = $trackRoot . '/bin/configlet';
    }

    public function cachePath(): string
    {
        $this->ensureConfigletCanBeUsed();

        return $this->pathToConfigletCache();
    }

    private function ensureConfigletCanBeUsed(): void
    {
        if (
            !(
                \is_executable($this->pathToConfiglet)
                && \is_file($this->pathToConfiglet)
            )
        ) {
            throw new RuntimeException(
                'configlet not found. Run the generator from track root.'
                . ' Fetch configlet and create exercise with configlet first!'
            );
        }
    }

    private function pathToConfigletCache(): string
    {
        /*
        When running configlet with detailed output (-v d) and a command that
        requires problem specification data (e.g. info), it prints the location
        of the cache as the first line. To avoid an HTTP call, use the offline
        mode (-o).

        Pipe the output through 'head' to get the first line only, then 'cut'
        the 5th field to get the path only.

        configlet may fail when there is no cached data (offline mode), which
        tells us, that the exercise hasn't been generated before (the cache is
        required for that, too). So BASH must use `-eo pipefail` to get the
        failure code back.
        */
        $command = 'bash -c \'set -eo pipefail; '
            . $this->pathToConfiglet
            . ' -v d -t '
            . $this->trackRoot
            . ' info -o | head -1 | cut -d " " -f 5\''
            ;
        $resultCode = 1;

        $configletCache = \exec(command: $command, result_code: $resultCode);
        if ($configletCache === false || $resultCode !== 0) {
            throw new RuntimeException(
                '"configlet" could not provide cached canonical data.'
                . ' Create exercise with configlet first!'
            );
        }

        return $configletCache;
    }
}
