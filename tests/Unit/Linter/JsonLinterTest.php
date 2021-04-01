<?php

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\JsonLinter;
use PHPUnit\Framework\TestCase;

class JsonLinterTest extends TestCase
{
    public function testValidJson(): void
    {
        $linter = new JsonLinter();
        $fileName = dirname(__DIR__, 2) . '/data/json/valid.json';
        $this->assertSame(true, $linter->lint($fileName));
    }

    public function testInvalidJson(): void
    {
        $linter = new JsonLinter();
        $fileName = dirname(__DIR__, 2) . '/data/json/invalid.json';
        $this->assertSame(false, $linter->lint($fileName));
    }
}
