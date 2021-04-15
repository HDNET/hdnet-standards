<?php

declare(strict_types=1);

namespace HDNET\Standards;

use PhpCsFixer\Config;

class PHPCSFixerConfigurationBuilder
{
    protected array $defaultRules = [
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        'clean_namespace' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'ordered_imports' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ];

    public function get(): Config
    {
        $config = new Config();
        return $config->setRules($this->defaultRules)
            ->setRiskyAllowed(true);
    }
}
