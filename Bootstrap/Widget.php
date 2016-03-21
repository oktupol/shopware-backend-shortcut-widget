<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
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