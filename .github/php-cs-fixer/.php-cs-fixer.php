<?php

declare(strict_types=1);


$finder = new PhpCsFixer\Finder()
    ->in(__DIR__.'../../src')
    ->exclude('var')
    ->exclude('tests')
    ->exclude('vendor')
;

return new PhpCsFixer\Config()
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(false);
