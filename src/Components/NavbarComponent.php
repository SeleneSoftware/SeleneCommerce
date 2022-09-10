<?php

namespace App\Components;

use App\Repository\CategoryRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('navbar')]
class NavbarComponent
{
    public string $tag;

    public string $class = '';

    public string $itemTag;

    public string $itemClass = '';

    public $linkClass = '';

    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories(): array
    {
        return $this->categoryRepository->findAll();
    }
}
