#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Deprecated;
use App\Command\TestBootstrap;
use App\Command\TestGenerate;
use App\Service\Configlet;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpClient\HttpClient;

$application = new Application();
$repositoryRoot = __DIR__ . '/../';
$configlet = new Configlet($repositoryRoot . '/bin/configlet', $repositoryRoot);
$exercises = new Filesystem(new LocalFilesystemAdapter($repositoryRoot . '/exercises'));

$application->addCommand(
    new Deprecated($exercises, HttpClient::createForBaseUri('https://github.com/exercism/problem-specifications')),
);
$application->addCommand(new TestBootstrap($configlet, $exercises));
$application->addCommand(new TestGenerate($configlet, $exercises));

$application->run();
