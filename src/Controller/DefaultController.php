<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(ProductRepository $productRepo): Response
    {
        // Currently, the featured products are just random products.
        // I actually plan on having a more defined list.
        return $this->render('default/index.html.twig', [
            'featured' => $prodRepo->findTenRand(),
            'controller_name' => 'DefaultController',
        ]);
    }
}
