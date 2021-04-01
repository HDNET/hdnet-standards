<?php

namespace HDNET\Standards\Linter;

use Seld\JsonLint\JsonParser;

class JsonLinter implements LinterInterface
{

    public function lint(string $filename): bool
    {
        $parser = new JsonParser();
        return null === $parser->lint(file_get_contents($filename));
    }

}
