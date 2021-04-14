<?php declare(strict_types=1);

namespace HDNET\Standards\Tests\Unit\Hook\Message;

use CaptainHook\App\Config;
use CaptainHook\App\Config\Action;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use HDNET\Standards\Hook\Message\JiraIssue;
use PHPUnit\Framework\TestCase;
use SebastianFeldmann\Git\CommitMessage;
use SebastianFeldmann\Git\Repository;

class JiraIssueTest extends TestCase
{

    /**
     * @throws \Exception
     * @dataProvider getValidConfigurations
     */
    public function testValidRegex(string $commitMessage, array $configuration): void
    {
        $this->expectNotToPerformAssertions();
        $this->executeJiraIssueHook($commitMessage, $configuration);
    }

    /**
     * @throws \Exception
     * @dataProvider getInvalidConfigurations
     */
    public function testInvalidRegex(string $commitMessage, array $configuration): void
    {
        $this->expectException(ActionFailed::class);
        $this->executeJiraIssueHook($commitMessage, $configuration);
    }

    protected function executeJiraIssueHook(string $commitMessage, array $configuration): void
    {
        $jiraIssueAction = new JiraIssue();

        $configMock = $this->createMock(Config::class);
        $ioMock = $this->createMock(IO::class);

        $repositoryMock = $this->createMock(Repository::class);
        $repositoryMock->method('getCommitMsg')
            ->willReturnCallback(fn () => new CommitMessage($commitMessage));

        $action = new Action('', $configuration);
        $jiraIssueAction->execute($configMock, $ioMock, $repositoryMock, $action);
    }

    public function getValidConfigurations(): array
    {
        return [
            ['XXX-123 Hallo Welt', ['project' => 'XXX']],
            ['HDNET-123 Hallo Welt', ['project' => 'HDNET']],
            ['HDNET-123 Hallo Welt', ['project' => 'HDNET']],
            ['HALLOHALLOHALLO-123 Hallo Welt', ['project' => 'HALLOHALLOHALLO']],
            ['HAL-11236782312324234234234234234234234 Hallo Welt', ['project' => 'HAL']],
        ];
    }

    public function getInvalidConfigurations(): array
    {
        return [
            ['HDNET-123 Hallo Welt', ['project' => '']],
            ['HDNET-123 Hallo Welt', []],
            ['XXX-123 Hallo Welt', ['project' => 'HDNET']],
            ['HDNET- Hallo Welt', ['project' => 'HDNET']],
            ['123 Hallo Welt', ['project' => 'HDNET']],
        ];
    }
}
