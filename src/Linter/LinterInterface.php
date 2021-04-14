<?php declare(strict_types=1);

namespace HDNET\Standards\Linter;

interface LinterInterface
{
    public function lint(string $filename):bool;

    public function getFileExtension():string;
}
