<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-03-21
 * Time: 01:23
 */

namespace SebastianWieland\ShortcutWidget\Bootstrap;


use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Components\Model\ModelManager;

class Models extends SetupInstanceBase
{
    /** @var ModelManager */
    protected $entityManager;

    /**
     * Models constructor.
     * @param \Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap
     */
    public function __construct(\Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap)
    {
        parent::__construct($bootstrap);
        $this->entityManager = $this->bootstrap->Application()->Container()->get('models');
    }

    /**
     * @return array
     */
    private function getModelClassNames()
    {
        $pluginName = $this->bootstrap->getName();

        return array_map(function ($incompleteClassName) use ($pluginName) {
            return 'Shopware\CustomModels\\' . $pluginName . '\\' . $incompleteClassName;
        }, array(
            'Shortcut',
            'Parameter'
        ));
    }

    /**
     * creates the tables for custom Models
     */
    private function createModels()
    {
        $entityManager = $this->entityManager;
        $schemaTool = new SchemaTool($entityManager);

        $classes = array_map(function ($className) use ($entityManager) {
            return $entityManager->getClassMetadata($className);
        }, $this->getModelClassNames());

        try {
            $schemaTool->createSchema($classes);
        } catch (\Exception $e) {
            // ignore
        }
    }

    /**
     * removes the tables for custom Models
     */
    private function removeModels()
    {
        $entityManager = $this->entityManager;
        $schemaTool = new SchemaTool($entityManager);

        $classes = array_map(function ($className) use ($entityManager) {
            return $entityManager->getClassMetadata($className);
        }, $this->getModelClassNames());

        try {
            $schemaTool->dropSchema($classes);
        } catch (\Exception $e) {
            // ignore
        }
    }

    /**
     * @inheritdoc
     */
    public function install()
    {
        $this->createModels();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function uninstall()
    {
        $this->removeModels();
        return true;
    }
}