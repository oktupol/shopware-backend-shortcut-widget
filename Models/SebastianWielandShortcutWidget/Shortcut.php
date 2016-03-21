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
 * Time: 00:47
 */

namespace Shopware\CustomModels\SebastianWielandShortcutWidget;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * Class Shortcut
 * @package Shopware\CustomModels\SebastianWielandShortcutWidget
 * @ORM\Entity
 * @ORM\Table(name="sebastian_wieland_shortcut_widget_shortcuts")
 */
class Shortcut extends ModelEntity
{
    /**
     * @var integer $id
     *
     * @ORM\ID
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string $link
     * @ORM\Column(name="link", type="string", nullable=true)
     */
    protected $link;

    /**
     * @var string $subApplication
     * @ORM\Column(name="sub_application", type="string", nullable=true)
     */
    protected $subApplication;

    /**
     * @var string $action
     * @ORM\Column(name="action", type="string", nullable=true)
     */
    protected $subApplicationAction;

    /**
     * @var Parameter[]
     * @ORM\OneToMany(
     *     targetEntity="Shopware\CustomModels\SebastianWielandShortcutWidget\Parameter",
     *     mappedBy="shortcut",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getSubApplication()
    {
        return $this->subApplication;
    }

    /**
     * @param string $subApplication
     * @return $this
     */
    public function setSubApplication($subApplication)
    {
        $this->subApplication = $subApplication;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubApplicationAction()
    {
        return $this->subApplicationAction;
    }

    /**
     * @param string $subApplicationAction
     * @return $this
     */
    public function setSubApplicationAction($subApplicationAction)
    {
        $this->subApplicationAction = $subApplicationAction;
        return $this;
    }

    /**
     * @return Parameter[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param Parameter[] $parameters
     * @return $this
     */
    public function setParameters($parameters)
    {
        return $this->setOneToMany(
            $parameters,
            '\Shopware\CustomModels\SebastianWielandShortcutWidget\Parameter',
            'parameters',
            'shortcut'
        );
    }
}