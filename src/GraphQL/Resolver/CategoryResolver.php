<?php

namespace App\GraphQL\Resolver;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class CategoryResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        if ($args['id']) {
            return $this->em->getRepository(Category::class)->findOneBy(['id' => $args['id']]);
        } elseif ($args['slug']) {
            return $this->em->getRepository(Category::class)->findOneBy(['slug' => $args['slug']]);
        } else {
            return new Category();
        }
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Category',
        ];
    }
}
