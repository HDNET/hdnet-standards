<?php

declare(strict_types=1);

namespace HDNET\Standards\Linter;

use PhpCsFixer\Linter\ProcessLinter;

class PHPLinter implements LinterInterface
{
    public function lint(string $filename): bool
    {
        $jsonParser = new ProcessLinter();
        return null === $jsonParser->lintFile(file_get_contents($filename));
    }

    public function getFileExtension(): string
    {
        return 'php';
    }
}
