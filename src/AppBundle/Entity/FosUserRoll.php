<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/28/2018
 * Time: 4:31 PM
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * FosUserRoll
 *
 * @ORM\Table(name="roll")
 * @ORM\Entity
 */
class FosUserRoll{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $disname;


    /**
     * Role constructor.
     */
    public function __construct($role)
    {
        $this->name = $role;
    }

    /**
     * Get id
     *
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
     * @return FosUserRoll
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

    public function getRole()
    {
        return $this->name;
    }

    public function __toString() {
        return $this->name;
    }

    /**
     * Set disname
     *
     * @param string $disname
     *
     * @return FosUserRoll
     */
    public function setDisname($disname)
    {
        $this->disname = $disname;

        return $this;
    }

    /**
     * Get disname
     *
     * @return string
     */
    public function getDisname()
    {
        return $this->disname;
    }
}