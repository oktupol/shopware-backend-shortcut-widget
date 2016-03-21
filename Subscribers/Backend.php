<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
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
        return;
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

        for ($i = 0, $l = count($templatesToExtend); $i < $l; $view->extendsTemplate('backend/sebastian_wieland_shortcut_widget_index/' . $templatesToExtend[$i++])) ;
    }
}