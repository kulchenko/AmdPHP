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

namespace core;

use core\components\Components;
use core\components\LoadComponents;

class Factory
{
    private $components;

    public function __construct()
    {
        $this->components = new Components(
            new LoadComponents(
                new FilePHP('config/import')
            )
        );
    }

    public function get($name)
    {
        return $this->components->getComponent($name);
    }
}