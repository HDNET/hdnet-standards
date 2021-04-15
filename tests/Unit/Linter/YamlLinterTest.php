<?php

declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\LinterInterface;
use HDNET\Standards\Linter\YamlLinter;

class YamlLinterTest extends AbstractFileBasedActionTest
{
    public function getLinter(): LinterInterface
    {
        return new YamlLinter();
    }

    public function getValidFiles(): array
    {
        return [
            ['data/yaml/valid.yaml'],
        ];
    }
    public function getInvalidFiles(): array
    {
        return [
            ['data/yaml/invalid.yaml'],
        ];
    }

    public function testValidFileExtension(): void
    {
        $linter = new YamlLinter();
        $this->assertSame('yaml', $linter->getFileExtension());
    }
}
