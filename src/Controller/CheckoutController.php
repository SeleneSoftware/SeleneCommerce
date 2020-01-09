<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout()
    {
        return $this->render('checkout/checkout.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('checkout/cart.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
}
