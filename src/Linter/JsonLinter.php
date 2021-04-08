<?php

namespace HDNET\Standards\Linter;

use Seld\JsonLint\JsonParser;

class JsonLinter implements LinterInterface
{
    public function lint(string $filename): bool
    {
        $jsonParser = new JsonParser();
        return null === $jsonParser->lint(file_get_contents($filename));
    }
}
