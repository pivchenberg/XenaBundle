<?php
/**
 * Created by PhpStorm.
 * User: pivchenberg
 * DateTime: 03.04.2017 16:19
 */

namespace Pivchenberg\XenaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class XenaAdminController
 * @package Pivchenberg\XenaBundle\Controller
 *
 * @Route("/x-admin", name="xena_admin_controller")
 */
class XenaAdminController extends Controller
{
    /**
     * @Route("/", name="xena_admin_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $baseRepo = $em->getRepository('XenaBundle:BaseNode');

        $rootNodes = $baseRepo->findRootNodes();
        dump($rootNodes);

        return $this->render('@Xena/Admin/index.html.twig');
    }
}