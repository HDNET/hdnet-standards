<?php declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Hook\Message;

use HDNET\Standards\Hook\Message\ConventionalCommits;
use PHPUnit\Framework\TestCase;

class ConventionalCommitsTest extends TestCase
{
    public function testConventionalCommits(): void
    {
        $cc = new ConventionalCommits();
        $this->assertTrue($cc instanceof ConventionalCommits);
    }
}
