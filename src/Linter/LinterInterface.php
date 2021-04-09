<?php

namespace HDNET\Standards\Linter;

interface LinterInterface
{
    public function lint(string $filename):bool;
}
