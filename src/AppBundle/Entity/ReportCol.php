<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/27/2018
 * Time: 7:59 PM
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * ReportCol
 *
 * @ORM\Table(name="Report_Col")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */

class  ReportCol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="PlanProduct")
     * @ORM\JoinColumn(name="plan_product", referencedColumnName="id", nullable=true)
     */
   // private $planProduct;

    /**
     * @ORM\ManyToOne(targetEntity="Plan")
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id", nullable=true)
     */
  //  private $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="col_number", type="string", length=2, nullable=true)
     */
    private $colNumber;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set colNumber
     *
     * @param string $colNumber
     *
     * @return ReportCol
     */
    public function setColNumber($colNumber)
    {
        $this->colNumber = $colNumber;

        return $this;
    }

    /**
     * Get colNumber
     *
     * @return string
     */
    public function getColNumber()
    {
        return $this->colNumber;
    }
}