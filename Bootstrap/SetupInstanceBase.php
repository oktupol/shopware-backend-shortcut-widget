<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-03-20
 * Time: 23:49
 */

namespace SebastianWieland\ShortcutWidget\Bootstrap;


abstract class SetupInstanceBase
{
    /**
     * The plugin's bootstrap instance
     * @var \Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap
     */
    protected $bootstrap;

    /**
     * SetupInstanceBase constructor.
     * @param \Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap
     */
    public function __construct(\Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap)
    {
        $this->bootstrap = $bootstrap;
    }

    /**
     * @return bool
     */
    public function install()
    {
        return true;
    }

    /**
     * @param $previousVersion
     * @return bool
     */
    public function update($previousVersion)
    {
        return true;
    }

    /**
     * @return bool
     */
    public function secureUninstall()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        return $this->secureUninstall();
    }

    /**
     * @return bool
     */
    public function enable()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function disable()
    {
        return true;
    }

}