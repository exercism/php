#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Deprecated;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpClient\HttpClient;

$application = new Application();

$exercises = new LocalFilesystemAdapter(__DIR__ . '/../exercises');
$application->addCommand(
    new Deprecated(
        new Filesystem($exercises),
        HttpClient::createForBaseUri('https://github.com/exercism/problem-specifications'),
    ),
);

$application->run();
