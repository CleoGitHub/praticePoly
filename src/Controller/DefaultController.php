<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Container;
use App\Entity\SuperClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

//        $container = $this->getDoctrine()->getRepository(SuperClass::class)->findAll()[0];
//        dump($container);
        $articles = $this->getDoctrine()->getRepository(Container::class)->findAll()[0]->getChilds();
        return $this->render('default/index.html.twig', [
            'articles' => $articles,
            'c' => $this->getDoctrine()->getRepository(Client::class)->findOneByNom('Brassens')
        ]);
    }
}
