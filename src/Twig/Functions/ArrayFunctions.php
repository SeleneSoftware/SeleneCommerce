<?php

namespace App\Twig\Functions;

use Twig\Extension\RuntimeExtensionInterface;

class ArrayFunctions implements RuntimeExtensionInterface
{
    public function shuffleArray($array): array
    {
        // shuffle takes the reference to an array, and shuffles the original array, returning only a bool.
        // I want to preserve the original array.
        $ret = $array;
        shuffle($ret);

        return $ret;
    }
}
