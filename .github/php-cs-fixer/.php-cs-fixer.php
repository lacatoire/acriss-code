<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([__DIR__ . '/../../src', __DIR__ . '/../../tests']);

$config = new Config();
$config->setRules(['@Symfony' => true]);
$config->setFinder($finder);
$config->setUsingCache(false);

return $config;
