<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
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