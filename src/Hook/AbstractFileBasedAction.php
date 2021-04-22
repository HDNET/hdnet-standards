<?php

declare(strict_types=1);

namespace HDNET\Standards\Hook;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use HDNET\Standards\Linter\LinterInterface;
use SebastianFeldmann\Git\Repository;

abstract class AbstractFileBasedAction implements Action
{
    abstract protected function getLinter(): LinterInterface;


    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action): void
    {
        $linter = $this->getLinter();
        $options = $action->getOptions();
        $directory = dirname($config->getPath()) . '/' . ltrim($options->get('directory'), '/');
        $files = $this->getFiles($directory);
        foreach ($files as $file) {
            if (!$linter->lint($file)) {
                throw new ActionFailed('invalid ' . $linter->getFileExtension() . ' at: ' . $file);
            }
        }

        if (count($files) > 1) {
            $io->write(count($files) . ' ' . $linter->getFileExtension() . '-files are good!');
        } elseif (count($files) == 1) {
            $io->write('The ' . count($files) . ' ' . $linter->getFileExtension() . '-file is good!');
        } else {
            $io->write(count($files) . ' ' . $linter->getFileExtension() . '-files found in this directory.');
        }
    }

    protected function getFiles(?string $directory = null): array
    {
        $files = [];
        if ($directory && is_dir($directory)) {
            $fileNames = scandir($directory);
            foreach ($fileNames as $fileName) {
                $fullFileName = rtrim($directory, '/') . '/' . $fileName;
                if (is_file($fullFileName)) {
                    $files[] = $fullFileName;
                }
            }
        }

        return $files;
    }
}
