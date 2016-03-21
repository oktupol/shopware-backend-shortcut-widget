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
 * Time: 00:28
 */

namespace SebastianWieland\ShortcutWidget\Subscribers;


use Enlight\Event\SubscriberInterface;
use Shopware\Components\DependencyInjection\Container;

class Backend implements SubscriberInterface
{
    /** @var \Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap */
    protected $bootstrap;

    /** @var \Shopware $application */
    protected $application;

    /** @var Container */
    protected $container;

    /**
     * Backend constructor.
     * @param \Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap
     */
    public function __construct(\Shopware_Plugins_Backend_SebastianWielandShortcutWidget_Bootstrap $bootstrap)
    {
        $this->bootstrap = $bootstrap;
        $this->application = $this->bootstrap->Application();
        $this->container = $this->application->Container();
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PostDispatchSecure_Backend_Index' => 'onPostDispatchSecureBackendIndex'
        );
    }

    /**
     * @param \Enlight_Controller_ActionEventArgs $eventArgs
     */
    public function onPostDispatchSecureBackendIndex(\Enlight_Controller_ActionEventArgs $eventArgs)
    {
        /** @var \Shopware_Controllers_Backend_Index $controller */
        $controller = $eventArgs->getSubject();
        $request = $controller->Request();
        $view = $controller->View();

        $view->addTemplateDir($this->bootstrap->Path() . 'Views/');

        switch ($request->getActionName()) {
            case 'index':
                $templatesToExtend = array(
                    'app.js'
                );
                break;
            default:
                $templatesToExtend = array();
        }

        for ($i = 0, $l = count($templatesToExtend); $i < $l; $view->extendsTemplate('backend/index/sebastian_wieland_shortcut/' . $templatesToExtend[$i++])) ;
    }
}