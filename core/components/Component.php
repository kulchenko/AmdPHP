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

class Component implements IComponent
{
    private $className;
    private $params;

    public function __construct($className, Params $params)
    {
        $this->className = $className;
        $this->params = $params;
    }

    public function getName()
    {
        return $this->className;
    }

    public function getParams()
    {
        return $this->params->getParams();
    }
}