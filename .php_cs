<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in(__DIR__)
;

$config = (new HDNET\Standards\PHPCSFixerConfigurationBuilder())->get();
return $config->setFinder($finder);