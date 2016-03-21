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
        return true;
    }
}