<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SubCategory;
use App\Form\CategoryType;
use App\Form\SubCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoriesController extends AbstractController
{
    /**
     * @Route("/admin/categories", name="admin-categories")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);

        return $this->render('admin/categories/index.html.twig', [
            'categories' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/admin/categories/new", name="admin-categories-new")
     */
    public function newCategory(Request $request)
    {
        $cat = new Category();
        $form = $this->createForm(CategoryType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('admin-sub-categories-new', ['parent' => $cat->getId()]);
        }
        $repo = $this->getDoctrine()->getRepository(Category::class);

        return $this->render('admin/categories/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/categories/{id}", name="admin-categories-edit")
     */
    public function editCategory(Request $request, Category $id)
    {
        $cat = $id;
        $form = $this->createForm(CategoryType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('admin-categories');
        }
        $repo = $this->getDoctrine()->getRepository(Category::class);

        return $this->render('admin/categories/new.html.twig', [
            'category' => $cat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/sub-categories", name="admin-sub-categories")
     */
    public function subIndex()
    {
        $repo = $this->getDoctrine()->getRepository(SubCategory::class);

        return $this->render('admin/categories/sub-index.html.twig', [
            'categories' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/admin/sub-categories/new", name="admin-sub-categories-new")
     */
    public function newSubCategory(Request $request)
    {
        $cat = new SubCategory();

        if ($request->get('parent')) {
            $repo = $this->getDoctrine()->getRepository(Category::class);
            $cat->setCategory($repo->findOneBy(['id' => $request->get('parent')]));
        }
        $form = $this->createForm(SubCategoryType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('admin-categories');
        }

        return $this->render('admin/categories/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/sub-categories/{id}", name="admin-sub-categories-edit")
     */
    public function editSubCategory(Request $request, SubCategory $id)
    {
        $cat = $id;
        $form = $this->createForm(SubCategoryType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('admin-categories');
        }

        return $this->render('admin/categories/sub-new.html.twig', [
            'category' => $cat,
            'form' => $form->createView(),
        ]);
    }
}
