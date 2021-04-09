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
        $files = $this->getFiles($options->get('directory'));
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
        // @todo based on configuration (Staged, finder... folder based, whitelist, blacklist etc.)
        $files = [
            __DIR__ . '/../../tests/data/json/valid.json'
        ];
        if ($directory && is_dir($directory)) {
            $fileNames = scandir($directory);
            $files = array_map(function (string $file) use ($directory) {
                return __DIR__ . $directory . $file;
            }, $fileNames);
        }

        return $files;
    }
}
