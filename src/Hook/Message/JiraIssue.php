<?php

namespace HDNET\Standards\Hook\Message;

use CaptainHook\App\Config\Options;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Message\Action\Regex;

class JiraIssue extends Regex
{
    /**
     * Extract regex from options array
     *
     * @param Options $options
     * @return string
     */
    protected function getRegex(Options $options): string
    {
        if (empty($options->get('project'))) {
            throw new ActionFailed('No project configuration');
        }

        // @todo option für Projekt Key! (siehe captainhook.json)
        return '/' . $options->get('project') . '-[0-9]+ .*/';
    }
}
