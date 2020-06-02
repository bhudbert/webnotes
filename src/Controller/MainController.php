<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @TODO
     */

    /**
     * @Route("/", name="home")
     */

    public function index()
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
