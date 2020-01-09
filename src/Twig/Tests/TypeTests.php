<?php

namespace App\Twig\Tests;

use Twig\Extension\RuntimeExtensionInterface;

class TypeTests implements RuntimeExtensionInterface
{
    public function typeTest($var, $typeTest = null, $className = null)
    {
        switch ($typeTest) {
        case 'array':
            return is_array($var);
            break;

        case 'bool':
            return is_bool($var);
            break;

        case 'class':
            return true === is_object($var) && get_class($var) === $className;
            break;

        case 'float':
            return is_float($var);
            break;

        case 'int':
            return is_int($var);
            break;

        case 'numeric':
            return is_numeric($var);
            break;

        case 'object':
            return is_object($var);
            break;

        case 'scalar':
            return is_scalar($var);
            break;

        case 'string':
            return is_string($var);
            break;
        default:
            return false;
        }
    }
}
