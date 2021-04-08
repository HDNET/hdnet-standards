<?php

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\YamlLinter;
use PHPUnit\Framework\TestCase;

class YamlLinterTest extends TestCase
{
    public function testValidYaml(): void
    {
        $linter = new YamlLinter();
        $fileName = dirname(__DIR__, 2) . '/data/yaml/valid.yaml';
        $this->assertTrue($linter->lint($fileName));
    }

    public function testInvalidYaml(): void
    {
        $linter = new YamlLinter();
        $fileName = dirname(__DIR__, 2) . '/data/yaml/invalid.yaml';
        $this->assertNotTrue($linter->lint($fileName));
    }
}
