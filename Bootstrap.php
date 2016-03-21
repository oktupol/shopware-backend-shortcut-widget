<?php

/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-03-20
 * Time: 23:30
 */
class Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * Setup-Instances of this plugin
     * @var \SebastianWieland\ShortcutWidget\Bootstrap\SetupInstanceBase[] $setupInstances ;
     */
    private $setupInstances;

    /**
     * Singleton-Method for setup-instances of this plugin
     * @return \SebastianWieland\ShortcutWidget\Bootstrap\SetupInstanceBase[]
     */
    private function getSetupInstances()
    {
        if (!$this->setupInstances) {
            $this->setupInstances = array(
                new \SebastianWieland\ShortcutWidget\Bootstrap\Events($this),
                new \SebastianWieland\ShortcutWidget\Bootstrap\Models($this),
                new \SebastianWieland\ShortcutWidget\Bootstrap\Widget($this)
            );
        }

        return $this->setupInstances;
    }

    public function onFrontStartDispatch()
    {
        if (!$this->isCompatibleWithCurrentShopwareVersion()) {
            return;
        }

        /** @var \Shopware\Components\DependencyInjection\Container $container */
        $container = $this->Application()->Container();
        /** @var Enlight_Event_EventManager $eventManager */
        $eventManager = $container->get('events');

        /** @var \Enlight\Event\SubscriberInterface $subscribers */
        $subscribers = array(
            new \SebastianWieland\ShortcutWidget\Subscribers\Backend($this)
        );

        foreach ($subscribers as $subscriber) {
            $eventManager->addSubscriber($subscriber);
        }
    }

    /**
     * @inheritdoc
     */
    public function afterInit()
    {
        $this->Application()->Loader()->registerNamespace(
            'SebastianWieland\ShortcutWidget',
            $this->Path()
        );

        $this->registerCustomModels();
    }

    /**
     * @var array $pluginInfo
     * Plugin-information from plugin.json
     */
    private $pluginInfo;

    /**
     * Singleton-Method for plugin-info from plugin.json
     */
    private function getPluginInfo()
    {
        if (!$this->pluginInfo) {
            $this->pluginInfo = json_decode(file_get_contents(__DIR__ . '/plugin.json'), true);
        }

        return $this->pluginInfo;
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return $this->getPluginInfo()['currentVersion'];
    }

    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return $this->getPluginInfo()['label'];
    }

    /**
     * @inheritdoc
     */
    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'description' => $this->getPluginInfo()['description'],
            'author' => $this->getPluginInfo()['author']
        );
    }

    /**
     * @return bool
     */
    private function isCompatibleWithCurrentShopwareVersion()
    {
        $compatibility = $this->getPluginInfo()['compatibility'];
        $shopwareVersion = $this->Application()->Config()->get('version');

        if (version_compare($shopwareVersion, $compatibility['minimumVersion'], '<')) {
            return false;
        }
        if (!empty($compatibility['maximumVersion']) && version_compare($shopwareVersion, $compatibility['maximumVersion'], '>')) {
            return false;
        }
        if (in_array($shopwareVersion, $compatibility['blacklist'])) {
            return false;
        }

        return true;
    }

    /**
     * @param $compatibility
     * @return string
     */
    private function getCompatibilityErrorMessage($compatibility)
    {
        return 'This plugin is only compatible for Shopware versions ' .
        (empty($compatibility['maximumVersion']) ? 'greater than ' . $compatibility['minimumVersion']
            : 'between ' . $compatibility['minimumVersion'] . ' and ' . $compatibility['maximumVersion']) .
        (empty($compatibility['blacklist']) ? '.' : ', except for ' . implode($compatibility['blacklist'], ', ') . '.');
    }

    /**
     * @inheritdoc
     */
    public function install()
    {
        if (!$this->isCompatibleWithCurrentShopwareVersion()) {
            throw new Enlight_Exception($this->getCompatibilityErrorMessage($this->getPluginInfo()['compatibility']));
        }

        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->install()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function update($previousVersion)
    {
        if (!$this->isCompatibleWithCurrentShopwareVersion()) {
            throw new Enlight_Exception($this->getCompatibilityErrorMessage($this->getPluginInfo()['compatibility']));
        }

        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->update($previousVersion)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function secureUninstall()
    {
        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->secureUninstall()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function uninstall()
    {
        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->uninstall()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function enable()
    {
        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->enable()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function disable()
    {
        foreach ($this->getSetupInstances() as $setupInstance) {
            if (!$setupInstance->disable()) {
                return false;
            }
        }

        return true;
    }
}