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
 * Time: 00:24
 */

namespace SebastianWieland\ShortcutWidget\Bootstrap;


class Widget extends SetupInstanceBase
{
    /**
     * @inheritdoc
     */
    public function install()
    {
        $this->bootstrap->createWidget('sebastian-wieland-shortcut');
        $this->bootstrap->registerController('Backend', $this->bootstrap->getName());
        $this->bootstrap->createMenuItem(array(
            'label' => 'Shortcuts',
            'controller' => $this->bootstrap->getName(),
            'action' => 'Index',
            'class' => 'sprite-documents',
            'active' => true,
            'parent' => $this->bootstrap->Menu()->findOneBy(array('label' => 'Einstellungen'))
        ));
        return true;
    }
}