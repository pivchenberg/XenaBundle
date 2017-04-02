<?php

namespace Pivchenberg\XenaBundle\Controller;

use Pivchenberg\XenaBundle\Entity\ArticleNode;
use Pivchenberg\XenaBundle\Entity\ProductNode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $food = new ProductNode();
//        $food->setTitle('Food');
//
//        $fruits = new ProductNode();
//        $fruits->setTitle('Fruits');
//        $fruits->setParent($food);
//
//        $vegetables = new ProductNode();
//        $vegetables->setTitle('Vegetables');
//        $vegetables->setParent($food);
//
//        $carrots = new ArticleNode();
//        $carrots->setTitle('Carrots');
//        $carrots->setParent($vegetables);
//
//        $em->persist($food);
//        $em->persist($fruits);
//        $em->persist($vegetables);
//        $em->persist($carrots);
//        $em->flush();


        ($em->getRepository('XenaBundle:BaseNode')->findAll(['id' => 1]));
        //die();
        return $this->render('XenaBundle:Default:index.html.twig');
    }
}
