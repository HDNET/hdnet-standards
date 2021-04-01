<?php
/**
 *
 */

namespace HDNET\Standards\Hook\Message;


use CaptainHook\App\Config\Options;
use CaptainHook\App\Exception\ActionFailed;

class JiraIssue extends \CaptainHook\App\Hook\Message\Action\Regex
{
    /**
     * Extract regex from options array
     *
     * @param \CaptainHook\App\Config\Options $options
     * @return string
     * @throws \CaptainHook\App\Exception\ActionFailed
     */
    protected function getRegex(Options $options): string
    {
        return '/XXX-[0-9]+ .*/';
    }
}
