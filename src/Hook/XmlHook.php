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
use HDNET\Standards\Linter\LinterInterface;
use HDNET\Standards\Linter\XmlLinter;
use HDNET\Standards\Linter\YamlLinter;
use SebastianFeldmann\Git\Repository;

class XmlHook extends AbstractFileBasedAction
{
    protected function getLinter():LinterInterface {
        return new XmlLinter();
    }
}
