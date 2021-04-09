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
        $files = $this->getFiles();
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

    protected function getFiles(): array
    {
        // @todo based con configuration (Staged, finder... folder based, whitelist, blacklist etc.)
        return [
            __DIR__ . '/../../tests/data/json/valid.json'
        ];
    }
}
