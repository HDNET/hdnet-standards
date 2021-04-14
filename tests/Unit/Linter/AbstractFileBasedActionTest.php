<?php declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Linter;

use HDNET\Standards\Linter\LinterInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractFileBasedActionTest extends TestCase
{
    abstract public function getLinter(): LinterInterface;

    abstract public function getValidFiles(): array;

    abstract public function getInvalidFiles(): array;


    /**
     * @dataProvider getValidFiles
     */
    public function testValidFiles(string $file): void
    {
        $linter = $this->getLinter();
        $fileName = dirname(__DIR__, 2) . '/' . $file;
        $this->assertTrue($linter->lint($fileName));
    }

    /**
     * @dataProvider getInvalidFiles
     */
    public function testInvalidFiles(string $file): void
    {
        $linter = $this->getLinter();
        $fileName = dirname(__DIR__, 2) . '/' . $file;
        $this->assertFalse($linter->lint($fileName));
    }
}
