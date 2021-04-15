<?php

declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\LinterInterface;
use HDNET\Standards\Linter\XmlLinter;

class XmlLinterTest extends AbstractFileBasedActionTest
{
    public function getLinter(): LinterInterface
    {
        return new XmlLinter();
    }

    public function getValidFiles(): array
    {
        return [
            ['data/xml/valid.xml'],
        ];
    }
    public function getInvalidFiles(): array
    {
        return [
            ['data/xml/invalid.xml'],
        ];
    }

    public function testValidFileExtension(): void
    {
        $linter = new XmlLinter();
        $this->assertSame('xml', $linter->getFileExtension());
    }
}
