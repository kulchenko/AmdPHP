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

class Components implements IComponents
{
    private $components = [];

    public function __construct(ILoadComponents $loadComponents)
    {
        $loadComponents->initialize($this);
    }

    public function addComponent($name, $className, array $params = [])
    {
        $this->components[$name] = new Component($className, new Params($this, $params));
    }

    public function isComponent($name)
    {
        return (! (is_array($name) || is_object($name)) && isset($this->components[$name]));
    }

    public function getComponent($name)
    {
        if ($this->isComponent($name)) {
            $creator = new Creator($this->components[$name]);
            return $creator->getComponent();
        }

        throw new \Exception('No component');
    }

    public function getComponents()
    {
        return $this->components;
    }
}