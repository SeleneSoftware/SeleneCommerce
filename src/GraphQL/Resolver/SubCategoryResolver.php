<?php

namespace App\GraphQL\Resolver;

use App\Entity\SubCategory;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class SubCategoryResolver implements ResolverInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        $game = $this->em->getRepository(SubCategory::class)->find($args['id']);

        return $game;
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'SubCategory',
        ];
    }
}
