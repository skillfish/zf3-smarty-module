<?php
namespace Smarty\Service\PluginProxy;

use Smarty\Plugin\CycleBlockPluginInterface;

class CycleBlockProxy
{
    /**
     * @var IfBlockPluginInterface
     */
    private $plugin;

    /**
     * @param IfBlockPluginInterface $plugin
     */
    public function __construct(CycleBlockPluginInterface $plugin)
    {
        $this->plugin = $plugin;
    }

    public function __invoke(array $params, $content, $smarty, &$repeat)
    {
        if (!$this->plugin->isValid($params, $smarty)) {
            $repeat = false;
            return '';
        }
        $repeat = true;
        return $this->plugin->prepare($params, $content, $smarty);
    }
}