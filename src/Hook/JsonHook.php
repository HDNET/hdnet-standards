<?php

namespace HDNET\Standards\Hook;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use HDNET\Standards\Linter\JsonLinter;
use HDNET\Standards\Linter\LinterInterface;
use SebastianFeldmann\Git\Repository;

class JsonHook extends AbstractFileBasedAction
{
    protected function getLinter():LinterInterface {
        return new JsonLinter();
    }
}
