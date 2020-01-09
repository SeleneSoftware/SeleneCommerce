<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductController extends AbstractController
{
    /**
     * @Route("/admin/product", name="admin-product")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);

        return $this->render('admin/product/index.html.twig', [
            'products' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/admin/product/new", name="admin-product-new")
     */
    public function newProduct(Request $request)
    {
        $prod = new Product();
        $form = $this->createForm(ProductType::class, $prod);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prod->getImage());
            $em->persist($prod);
            $em->flush();

            return $this->redirectToRoute('admin-product');
        }

        return $this->render('admin/product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/product/{id}", name="admin-product-edit")
     */
    public function editProduct(Request $request, Product $id)
    {
        $prod = $id;
        $form = $this->createForm(ProductType::class, $prod);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prod);
            $em->flush();

            return $this->redirectToRoute('admin-product');
        }
        $repo = $this->getDoctrine()->getRepository(Product::class);

        return $this->render('admin/product/new.html.twig', [
            'product' => $prod,
            'form' => $form->createView(),
        ]);
    }
}
