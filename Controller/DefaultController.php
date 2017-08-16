<?php

namespace Pivchenberg\XenaBundle\Controller;

use Pivchenberg\XenaBundle\Entity\ArticleNode;
use Pivchenberg\XenaBundle\Entity\ProductNode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('XenaBundle:BaseNode');
        $entity = $repo->findAll();
        dump($entity);

        if($request->query->get('add', 0))
        {
            $food = new ProductNode();
            $food->setNodeName('Food');

            $fruits = new ProductNode();
            $fruits->setNodeName('Fruits');
            $fruits->setParent($food);

            $vegetables = new ProductNode();
            $vegetables->setNodeName('Vegetables');
            $vegetables->setParent($food);

            $carrots = new ArticleNode();
            $carrots->setNodeName('Carrots');
            $carrots->setParent($vegetables);

            $em->persist($food);
            $em->persist($fruits);
            $em->persist($vegetables);
            $em->persist($carrots);
            $em->flush();
        }


        //die();
        return $this->render('XenaBundle:Default:index.html.twig');
    }
}
