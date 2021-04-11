<?php
/**
 *
 */

namespace HDNET\Standards\Hook;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use HDNET\Standards\Linter\JsonLinter;
use SebastianFeldmann\Git\Repository;

class JsonHook implements Action
{
    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action): void
    {
        $linter = new JsonLinter();
        $options = $action->getOptions();
        $directory = __DIR__ . $options->get('directory');
        $files = $this->getFiles($directory);
        foreach ($files as $file) {
            if (!$linter->lint($file)) {
                throw new ActionFailed('JSON invalid at: ' . $file);
            }
        }

        if (sizeof($files) > 1) {
            $io->write(sizeof($files) . ' JSON files are good!');
        } else {
            $io->write('The ' . sizeof($files) . ' JSON file is good!');
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
