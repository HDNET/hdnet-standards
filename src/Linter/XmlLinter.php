<?php

declare(strict_types=1);

namespace HDNET\Standards\Linter;

use sclable\xmlLint\console\application\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Yaml\Parser;

class XmlLinter implements LinterInterface
{
    public function lint(string $filename): bool
    {
        $argv = [
            'console',
            'lint',
            $filename,
        ];
        $input = new ArgvInput($argv);
        $output = new BufferedOutput();

        try {
            $application = new Application();
            $application->setAutoExit(false);
            $exitCode = $application->run($input, $output);
        } catch (\Exception $exception) {
            return false;
        }
        return $exitCode === 0;
    }

    public function getFileExtension(): string
    {
        return 'xml';
    }
}
