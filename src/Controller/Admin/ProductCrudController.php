<?php

namespace App\Controller\Admin;

use App\Entity\Location;
use App\Entity\Product;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field\TextField::new('name');
        yield Field\TextField::new('sku');
        yield Field\TextEditorField::new('description');
        yield Field\AssociationField::new('location'); // ->setQueryBuilder(
        //         fn (QueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Location::class)->findBySomeCriteria();
        // );
        yield Field\IntegerField::new('qty');
        yield Field\MoneyField::new('cost')->setNumDecimals(0)->setCurrency('USD');
        yield Field\BooleanField::new('public');
    }
}
