<?php

namespace HDNET\Standards\Hook;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use HDNET\Standards\Linter\LinterInterface;
use SebastianFeldmann\Git\Repository;

abstract class AbstractFileBasedAction implements Action
{

    protected abstract function getLinter(): LinterInterface;


    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action): void
    {
        $linter = $this->getLinter();
        $options = $action->getOptions();
        // @todo fix "__DIR__"
        $directory = __DIR__ . $options->get('directory');
        $files = $this->getFiles($directory);
        foreach ($files as $file) {
            if (!$linter->lint($file)) {
                throw new ActionFailed($linter->getFileExtension() . '-files invalid at: ' . $file);
            }
        }

        if (sizeof($files) > 1) {
            $io->write(sizeof($files) . ' ' . $linter->getFileExtension() . ' files are good!');
        } else {
            $io->write('The ' . sizeof($files) . ' ' . $linter->getFileExtension() . ' file is good!');
        }
    }

    protected function getFiles(?string $directory = null): array
    {
        $files = [];
        if ($directory && is_dir($directory)) {
            $fileNames = scandir($directory);
            foreach ($fileNames as $fileName) {
                $fullFileName = $directory . $fileName;
                if (is_file($fullFileName)) {
                    $files[] = $fullFileName;
                }
            }
        }

        return $files;
    }
}
