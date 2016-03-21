<?php
/**
 * Shopware Backend Shortcut Widget
 * Copyright (C) 2016  Sebastian Wieland
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Created by PhpStorm.
 * User: Sebastian Wieland
 * E-Mail: sebasti@nwie.land
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