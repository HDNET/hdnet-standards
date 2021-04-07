<?php
/**
 *
 */

namespace HDNET\Standards\Hook\Message;


use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Hook\Message\Rule;
use CaptainHook\App\Hook\Message\RuleBook;
use SebastianFeldmann\Git\Repository;
use RuntimeException;

class ChrisBeams extends \CaptainHook\App\Hook\Message\Action\Rules
{
    /**
     * Execute the configured action
     *
     * @param \CaptainHook\App\Config $config
     * @param IO $io
     * @param Repository $repository
     * @param Config\Action $action
     * @return void
     * @throws \Exception
     */
    public function execute(\CaptainHook\App\Config $config, IO $io, Repository $repository, Config\Action $action): void
    {
        $rules = $action->getOptions()->getAll();
        $rules[] = "\\CaptainHook\\App\\Hook\\Message\\Rule\\CapitalizeSubject"; // new CapitalizeSubject();
        $rules[] = "\\CaptainHook\\App\\Hook\\Message\\Rule\\MsgNotEmpty"; // new MsgNotEmpty();
        $rules[] = "\\CaptainHook\\App\\Hook\\Message\\Rule\\NoPeriodOnSubjectEnd"; // new NoPeriodOnSubjectEnd();
        $rules[] = "\\CaptainHook\\App\\Hook\\Message\\Rule\\UseImperativeMood"; // new UseImperativeMood();
        $book  = new RuleBook();
        foreach ($rules as $rule) {
            if (is_string($rule)) {
                $book->addRule($this->createRule($rule));
                continue;
            }
            $book->addRule($this->createRuleFromConfig($rule));
        }
        $this->validate($book, $repository, $io);
    }

    /**
     * Create a rule from a argument containing configuration
     *
     * @param  array $config
     * @return \CaptainHook\App\Hook\Message\Rule
     * @throws \Exception
     */
    protected function createRuleFromConfig(array $config): Rule
    {
        if (!is_string($config[0]) || !is_array($config[1])) {
            throw new RuntimeException('Invalid rule configuration');
        }
        return $this->createRule($config[0], $config[1]);
    }
}
