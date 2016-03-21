<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-03-20
 * Time: 23:57
 */

namespace SebastianWieland\ShortcutWidget\Bootstrap;


class Events extends SetupInstanceBase
{
    /**
     * @inheritdoc
     */
    public function install()
    {
        $this->bootstrap->subscribeEvent(
            'Enlight_Controller_Front_StartDispatch',
            'onFrontStartDispatch'
        );

        return true;
    }
}