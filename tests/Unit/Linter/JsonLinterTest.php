<?php declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\JsonLinter;
use HDNET\Standards\Linter\LinterInterface;

class JsonLinterTest extends AbstractFileBasedActionTest
{
    public function getLinter(): LinterInterface
    {
        return new JsonLinter();
    }

    public function getValidFiles(): array
    {
        return [
            ['data/json/valid.json'],
        ];
    }
    public function getInvalidFiles(): array
    {
        return [
            ['data/json/invalid.json'],
        ];
    }

    public function testValidFileExtension(): void
    {
        $linter = new JsonLinter();
        $this->assertSame('json', $linter->getFileExtension());
    }
}
