<?php declare(strict_types=1);

namespace HDNET\Standards;

use PhpCsFixer\Config;

class PHPCSFixerConfigurationBuilder
{
    protected array $defaultRules = [
        '@PSR2' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
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
