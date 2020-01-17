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

class Params
{
    private $components;
    private $params;

    public function __construct(IComponents $components, array $params)
    {
        $this->components = $components;
        $this->params = $params;
    }

    public function getParams()
    {
        foreach ($this->params as $key => $param) {
            if ($this->components->isComponent($param)) {
                $this->params[$key] = $this->components->getComponent($param);
            }
        }

        return $this->params;
    }
}