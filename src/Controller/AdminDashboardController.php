<?php

namespace App\Controller;

use App\Entity\Location;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Selene\CMSBundle\Controller\Admin\DashboardController;

class AdminDashboardController extends DashboardController
{
    public function configureMenuItems(): iterable
    {
        foreach (parent::configureMenuItems() as $item) {
            yield $item;
        }
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Locations', 'fas fa-list', Location::class);
    }
}
