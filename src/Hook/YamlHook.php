<?php
/**
 *
 */

namespace HDNET\Standards\Hook;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use HDNET\Standards\Linter\YamlLinter;
use SebastianFeldmann\Git\Repository;

class YamlHook implements Action
{
    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action): void
    {
        $linter = new YamlLinter();
        $files = $this->getFiles();
        foreach ($files as $file) {
            if (!$linter->lint($file)) {
                throw new ActionFailed('YAML invalid at: ' . $file);
            }
        }

        if (sizeof($files) > 1) {
            $io->write(sizeof($files) . ' YAML files are good!');
        } else {
            $io->write('The ' . sizeof($files) . ' YAML file is good!');
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
