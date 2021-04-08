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

        $io->write(sizeof($files) . ' YAML files are good!');
    }

    protected function getFiles(): array
    {
        // @todo based con configuration (Staged, finder... folder based, whitelist, blacklist etc.)
        return [
            __DIR__ . '/../../tests/data/yaml/invalid.yaml'
        ];
    }
}
