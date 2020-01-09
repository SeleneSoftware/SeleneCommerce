<?php

namespace App\Twig;

use App\Twig\Functions\ArrayFunctions;
use App\Twig\Functions\CategoryFunctions;
use App\Twig\Tests\TypeTests;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Twig\TwigTest;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            // new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getCategories', [CategoryFunctions::class, 'getCategories']),
            new TwigFunction('shuffle', [ArrayFunctions::class, 'shuffleArray']),
        ];
    }

    public function getTests(): array
    {
        return [
            new TwigTest('of_type', [TypeTests::class, 'typeTest']),
        ];
    }
}
