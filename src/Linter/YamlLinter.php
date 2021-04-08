<?php

namespace HDNET\Standards\Linter;

use \Symfony\Component\Yaml\Parser;

class YamlLinter implements LinterInterface
{
    public function lint(string $filename): bool
    {
        $yamlParser = new Parser();
        return null === $yamlParser->parse(file_get_contents($filename));
    }
}
