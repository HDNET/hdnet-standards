<?php

namespace HDNET\Standards\Linter;

use \Symfony\Component\Yaml\Parser;

class YamlLinter implements LinterInterface
{
    public function lint(string $filename): bool
    {
        try {
            $yamlParser = new Parser();
            return null !== $yamlParser->parse(file_get_contents($filename));
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function getFileExtension(): string
    {
        return 'yaml';
    }
}
