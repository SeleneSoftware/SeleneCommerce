<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * Route defined in routes.yaml.
     *
     * @Entity("slug", expr="repository.findOneBySlug(slug)")
     */
    public function index(Product $slug)
    {
        return $this->render('product/index.html.twig', [
            'product' => $slug,
        ]);
    }
}
