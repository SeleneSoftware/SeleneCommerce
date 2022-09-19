<?php

namespace App\Controller;

use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/{slug}', name: 'category')]
    #[Entity('category', expr: 'repository.findOneBySlug(slug)')]
    public function index(Category $cat): Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $cat,
        ]);
    }

    #[Route('/{slug}/{sub}', name: 'subcategory')]
    #[Entity('category', expr: 'repository.findOneBySlug(slug)')]
    public function subcat(Category $cat, string $sub): Response
    {
        foreach ($cat->getSubcategories() as $subcat) {
            if ($sub === $subcat->getSlug()) {
                break;
            }
        }

        return $this->render('category/subcat.html.twig', [
            'category' => $cat,
            'subcat' => $subcat,
        ]);
    }
}
