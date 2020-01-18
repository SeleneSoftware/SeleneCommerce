<?php

namespace App\Controller;

use App\Entity\Attribute;
use App\Form\ProductAttributeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminAttributesController extends AbstractController
{
    // /**
    //  * @Route("/admin/attributes", name="admin-attributes")
    //  */
    // public function index()
    // {
    //     $repo = $this->getDoctrine()->getRepository(Attribute::class);
    //     return $this->render('admin/attributes/index.html.twig', [
    //         'attributes' => $repo->findAll(),
    //     ]);
    // }
    //
    // /**
    //  * @Route("/admin/attributes/new", name="admin-attributes-new")
    //  */
    // public function newAttrib(Request $request)
    // {
    //     $attrib = new Attribute();
    //     $form = $this->createForm(ProductAttributeType::class, $attrib);
    //
    //     $form->handleRequest($request);
    //
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         var_dump($attrib);die();
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($prod->getImage());
    //         $em->persist($prod);
    //         $em->flush();
    //
    //         return $this->redirectToRoute('admin-product');
    //     }
    //
    //     return $this->render('admin/product/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
    //
    // /**
    //  * @Route("/admin/attributes/{id}", name="admin-attributes-edit")
    //  */
    // public function editAttrib(Request $request, Attribute $id)
    // {
    //     $attrib = $id;
    //     $form = $this->createForm(ProductAttributeType::class, $attrib);
    //
    //     $form->handleRequest($request);
    //
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         var_dump($attrib);die();
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($prod->getImage());
    //         $em->persist($prod);
    //         $em->flush();
    //
    //         return $this->redirectToRoute('admin-product');
    //     }
    //
    //     return $this->render('admin/product/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }
}
