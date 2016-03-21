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