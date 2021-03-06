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

class Config
{
    private $array;

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function get($name, $default = null)
    {
        if (is_array($this->array[$name])) return new self($this->array[$name]);
        return $this->array[$name] ?? $default;
    }

    public function set($name, $value)
    {
        return $this->array[$name] = $value;
    }

    public function __get($name)
    {
        if (is_array($this->array[$name])) return new self($this->array[$name]);
        return $this->array[$name] ?? null;
    }

    public function __set($name, $value)
    {
        return $this->array[$name] = $value;
    }
}