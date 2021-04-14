<?php

declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\JsonLinter;
use HDNET\Standards\Linter\XmlLinter;
use PHPUnit\Framework\TestCase;
use HDNET\Standards\Linter\LinterInterface;

class XmlLinterTest extends AbstractFileBasedActionTest
{
    public function getLinter(): LinterInterface
    {
        return new XmlLinter();
    }

    // @todo !!!!

    public function testValidFileExtension(): void
    {
        $linter = new XmlLinter();
        $this->assertSame('xml', $linter->getFileExtension());
    }

    public function testValidXml(): void
    {
        $linter = new XmlLinter();
        $fileName = dirname(__DIR__, 2) . '/data/xml/valid.xml';
        $this->assertTrue($linter->lint($fileName));
    }

    public function testInvalidXml(): void
    {
        $linter = new XmlLinter();
        $fileName = dirname(__DIR__, 2) . '/data/xml/invalid.xml';
        $this->assertNotTrue($linter->lint($fileName));
    }
}
