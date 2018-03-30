<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/27/2018
 * Time: 3:32 PM
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * HitoneType
 *
 * @ORM\Table(name="HitoneType")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class HitoneType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;
    /**
     * @var integer
     *
     * @ORM\Column(name="value",type="integer")
     */
    private $value;

    /**
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }
    /**
     * Set name
     *
     * @param string $name
     *
     * @return HitoneType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get name
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

}