<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2016 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace Joblocation\Form\Factory;

use Laminas\Form\Element\Checkbox;
use Psr\Container\ContainerInterface;

/**
 * Melis Text Input Element
 */
class MelisCheckboxFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return Checkbox|object
     */
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        $element = new Checkbox();

        $element->setAttribute('class', 'form-control');
        $element->setLabelOption('class','col-sm-2 control-label');

        return $element;
    }
}

