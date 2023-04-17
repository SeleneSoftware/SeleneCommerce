<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Selene\CMSBundle\Traits\BlogTrait;
use Selene\InventoryBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    use BlogTrait;

    #[Route('/product/{slug}', name: 'app_product')]
    public function productPage(#[MapEntity(mapping: ['slug' => 'slug'])] Product $product, ManagerRegistry $doctrine): Response
    {
        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}
