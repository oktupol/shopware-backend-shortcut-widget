<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 2016-03-21
 * Time: 00:52
 */

namespace Shopware\CustomModels\SebastianWielandShortcutWidget;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * Class Parameter
 * @package Shopware\CustomModels\SebastianWielandShortcutWidget
 * @ORM\Entity
 * @ORM\Table(name="sebastian_wieland_shortcut_widget_parameters")
 */
class Parameter extends ModelEntity
{
    const TYPE_BOOLEAN = 0;
    const TYPE_INTEGER = 1;
    const TYPE_FLOAT = 2;
    const TYPE_STRING = 3;
    const TYPE_JSON = 4;

    /**
     * @var integer $id
     *
     * @ORM\Id
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
     * @var integer $type
     * @ORM\Column(name="type", type="smallint")
     */
    protected $type;

    /**
     * @var string $value
     * @ORM\Column(name="value", type="text")
     */
    protected $value;

    /**
     * @var integer $shortcutId
     * @ORM\Column(name="shortcut_id", type="integer")
     */
    protected $shortcutId;

    /**
     * @ORM\ManyToOne(targetEntity="Shopware\CustomModels\SebastianWielandShortcutWidget\Shortcut", inversedBy="parameters")
     * @ORM\JoinColumn(name="shortcut_id", referencedColumnName="id")
     */
    protected $shortcut;

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
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getShortcutId()
    {
        return $this->shortcutId;
    }

    /**
     * @param int $shortcutId
     * @return $this
     */
    public function setShortcutId($shortcutId)
    {
        $this->shortcutId = $shortcutId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShortcut()
    {
        return $this->shortcut;
    }

    /**
     * @param mixed $shortcut
     * @return $this
     */
    public function setShortcut($shortcut)
    {
        $this->shortcut = $shortcut;
        return $this;
    }
}