<?php

namespace App\Controller;

use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\SubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category-all")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);

        return $this->render('category/index.html.twig', [
            'categories' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/category/{slug}", name="category")
     * @Entity("slug", expr="repository.findOneBySlug(slug)")
     */
    public function category(Category $slug)
    {
        return $this->render('category/index.html.twig', [
            'category' => $slug,
            'breadcrumb' => [
                'Category',
                $slug,
            ],
        ]);
    }

    /**
     * @Route("/category/{parent}/{slug}", name="category-sub")
     * @Entity("slug", expr="repository.findOneBySlug(slug)")
     * @Entity("parent", expr="repository.findOneBySlug(parent)")
     */
    public function subcategory(Category $parent, $slug)
    {
        foreach ($parent->getSubCategory() as $p) {
            if ($p->getSlug() === $slug) {
                return $this->render('category/sub.html.twig', [
                    'category' => $p,
                    'breadcrumb' => [
                        'Category',
                        $parent,
                        $p,
                    ],
                ]);
            }
        }

        throw $this->createNotFoundException('The subcategory does not exist');
    }
}
