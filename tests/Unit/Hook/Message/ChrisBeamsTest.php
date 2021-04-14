<?php declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Hook\Message;

use HDNET\Standards\Hook\Message\ChrisBeams;
use PHPUnit\Framework\TestCase;

class ChrisBeamsTest extends TestCase
{
    public function testExecutable(): void
    {
        $beams = new ChrisBeams();
        $this->assertTrue($beams instanceof ChrisBeams);
    }
}
