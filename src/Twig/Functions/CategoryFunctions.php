<?php

namespace App\Twig\Functions;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\RuntimeExtensionInterface;

class CategoryFunctions implements RuntimeExtensionInterface
{
    /**
     * Doctrine ORM.
     */
    protected $doctrine;

    public function __construct(EntityManagerInterface $em)
    {
        $this->doctrine = $em;
    }

    public function getCategories()
    {
        $repo = $this->doctrine->getRepository(Category::class);

        return $repo->findAll();
    }

    public function category($name, $search = 'slug')
    {
        $repo = $this->doctrine->getRepository(Category::class);

        return $repo->findOneBy([$search => $name]);
    }
}
