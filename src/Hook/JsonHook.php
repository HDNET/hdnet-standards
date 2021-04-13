<?php

namespace HDNET\Standards\Hook;

use HDNET\Standards\Linter\JsonLinter;
use HDNET\Standards\Linter\LinterInterface;

class JsonHook extends AbstractFileBasedAction
{
    protected function getLinter():LinterInterface
    {
        return new JsonLinter();
    }
}
