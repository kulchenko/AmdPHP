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

class Params
{
    private $params;

    public function __construct(array $keys, array $values)
    {
        $this->params = $this->generate($keys, $values);
    }

    public function get($key)
    {
        return $this->params[$key] ?? null;
    }

    private function generate(array $keys, array $values)
    {
        $result = [];

        foreach ($keys as $key => $value) {
            $result[$value] = $values[$key] ?? null;
        }

        return $result;
    }
}