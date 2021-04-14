<?php declare(strict_types=1);

namespace HDNET\Standards\Hook;

use HDNET\Standards\Linter\LinterInterface;
use HDNET\Standards\Linter\XmlLinter;

class XmlHook extends AbstractFileBasedAction
{
    protected function getLinter():LinterInterface
    {
        return new XmlLinter();
    }
}
