<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Selene\CMSBundle\Controller\Admin\DashboardController;
use Selene\InventoryBundle\Entity\Location;
use Selene\InventoryBundle\Entity\Product;
use Selene\InventoryBundle\Traits\DashboardControllerTrait;

class AdminDashboardController extends DashboardController
{
    use DashboardControllerTrait;

    public function configureMenuItems(): iterable
    {
        foreach ($this->InventoryMenuItems() as $item) {
            yield $item;
        }
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Locations', 'fas fa-list', Location::class);
    }
}
