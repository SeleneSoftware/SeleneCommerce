<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $magic = new Category();
        // $magic->setName('Magic: the Gathering')
        //     ->setSlug('magic')
        // ;

        $dnd = new Category();
        $dnd->setName('Dungeons and Dragons')
            ->setSlug('dnd')
        ;
        $rpg = new Category();
        $rpg->setName('Role Playing Games')
            ->setSlug('rpg')
        ;
        $powers = new Category();
        $powers->setName('POWERS Role Playing Game')
            ->setSlug('powers')
        ;

        // $zend = new Subcategory();
        // $zend->setName('Zendikar')
        //     ->setSlug('zendikar')
        // ;
        // $product = new Product();
        // $product->setName('Jace: the Mind Sculptor')
        //     ->setSlug('jace')
        //     ->setSku('1234')
        //     ->setType('single')
        // ;
        // $magic->addSubcategory($zend->addProduct($product));
        // $manager->persist($magic);
        $manager->persist($rpg);
        $manager->persist($powers);

        $manager->flush();
    }
}
