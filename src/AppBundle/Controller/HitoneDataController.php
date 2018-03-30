<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 3/27/2018
 * Time: 5:43 PM
 */
namespace AppBundle\Controller;

use AppBundle\Entity\HitoneData;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HitoneDataController
 * @package AppBundle\Control
 */
class HitoneDataController extends Controller
{
    /**
     * @Route("/upload-excel", name="upload_excel")
     * @Method({"GET", "POST"})
     *
     */
    public function excelParseAction(Request $request)
    {
        $HitoneData = new HitoneData();
        $form = $this->createForm('AppBundle\Form\ExcelUploadType',$HitoneData);

      //  $em = $this->getDoctrine()->getManager();
      //  $qb = $em->getRepository('')->createQueryBuilder('p');
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $HitoneData->uploadExcel($this->container);
            $resources = $this->container->getParameter('statfolder');
            $dir = 'excel/draft';
            $path = $resources . '/' . $dir . "/excel.xlsx";
            $file = $path;
            if (!file_exists($file)) {
                exit("file not found");
            }
            $objPHPExcel = \PHPExcel_IOFactory::load($file);
            $arr = array();

            $em = $this->getDoctrine()->getManager();
            $qb = $em->getRepository('incentiveAppBundle:ProductDraft')->createQueryBuilder('p');
          //  var_dump($file);
          //  exit();
            $productDrafts = $qb
                ->select('pr.id','p.colNumber')
                ->leftJoin('p.planProduct', 'pr')
                ->where('p.plan = :id')
                ->setParameter('id')
                ->getQuery()
                ->getResult();


            // Excel файл parse хийж утгуудийг array болгон $arr-д хадгалав
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                foreach ($worksheet->getRowIterator() as $key => $row) {
                    if ($key > 1) {
                        foreach ($productDrafts as $productDraft)
                        {
                            $productDraft['colNumber'];
                            array_push($arr
                                , array(
                                    'rowNumber' => $key,
                                    'productPlanData' => array(
                                        'id' => $productDraft['id'],
                                        'value' => $worksheet->getCell(     $productDraft['colNumber']. $key)->getCalculatedValue()),
                                ));
                        }
                    }
                }
            }

        }
        return $this->render('@App/Report/hitone.html.twig',array('form' => $form->createView()));

    }
}