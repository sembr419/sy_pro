<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/27/2018
 * Time: 3:32 PM
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * HitoneData
 *
 * @ORM\Table(name="HitoneData")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class HitoneData
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
     * @var integer
     * @ORM\Column(name="count",type="integer")
     */
    protected $count;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=true)
     */
    private $updatedDate;

    /**
     *
     * @Assert\File
     *
     *
     */
    private $excelfile;


    /**
     *
     * @param $container
     */
    public function uploadExcel(Container $container)
    {
        if (null === $this->getExcelFile()) {
            return;
        }
        $resources = $container->getParameter('statfolder');
        $dir = 'excel/draft';

        $filename = 'excel.' . $this->getExcelFile()->getClientOriginalExtension();
        $this->getExcelFile()->move(
            $resources .'/' .$dir , $filename
        );
    }


    /**
     * Get File
     *
     * @return UploadedFile
     */
    public function getExcelFile()
    {
        return $this->excelfile;
    }

    /**
     * Set File
     *
     * @param UploadedFile $file
     */
    public function setExcelFile(UploadedFile $file = null)
    {
        $this->excelfile = $file;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function  setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     *
     * @return HitoneData
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

}