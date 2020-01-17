<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @package AmdPHP\Config
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

namespace core\components;

class Creator
{
    private $component;

    public function __construct(IComponent $component)
    {
        $this->component = $component;
    }

    public function getComponent()
    {
        $ref = new \ReflectionClass($this->component->getName());
        return $ref->newInstanceArgs($this->component->getParams());
    }
}