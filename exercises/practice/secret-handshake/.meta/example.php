<?php

declare(strict_types=1);

class SecretHandshake
{
    public function commands(int $handshake): array
    {
        $handshakeCommands = ['wink', 'double blink', 'close your eyes', 'jump'];
        $shakeWith = [];

        for ($i = 0; $i < 4; $i++) {
            if ($handshake & (2 ** $i)) {
                $shakeWith[] = $handshakeCommands[$i];
            }
        }

        if ($handshake & (2 ** 4)) {
            $shakeWith = array_reverse($shakeWith);
        }

        return $shakeWith;
    }
}
