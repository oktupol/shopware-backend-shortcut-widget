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
 * Time: 00:43
 */
class Shopware_Controllers_Backend_SebastianWielandShortcutWidget extends Shopware_Controllers_Backend_Application
{
    protected $model = 'Shopware\CustomModels\SebastianWielandShortcutWidget\Shortcut';
    protected $alias = 'shortcut';

    /**
     * @inheritdoc
     */
    protected function getListQuery()
    {
        $builder = parent::getListQuery();

        $builder->leftJoin('shortcut.parameters', 'parameters');
        $builder->addSelect(array('parameters'));

        return $builder;
    }

    /**
     * @inheritdoc
     */
    protected function getAdditionalDetailData(array $data)
    {
        $data['parameters'] = array();
        return $data;
    }
}