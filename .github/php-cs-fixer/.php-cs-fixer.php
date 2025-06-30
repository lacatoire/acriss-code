<?php

declare(strict_types=1);

$finder = new PhpCsFixer\Finder();

return new PhpCsFixer\Config()
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(false);
