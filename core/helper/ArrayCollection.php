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

namespace core\helper;

class ArrayCollection implements \Iterator
{
    private $array;

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function get($name, $default = null)
    {
        return $this->array[$name] ?? $default;
    }

    public function set($name, $value)
    {
        return $this->array[$name] = $value;
    }

    public function __get($name)
    {
        return $this->array[$name] ?? null;
    }

    public function __set($name, $value)
    {
        return $this->array[$name] = $value;
    }

    public function has($name)
    {
        return isset($this->array[$name]);
    }

    public function current()
    {
        return current($this->array);
    }

    public function next()
    {
        return next($this->array);
    }

    public function key()
    {
        return key($this->array);
    }

    public function valid()
    {
        return current($this->array);
    }

    public function rewind()
    {
        return reset($this->array);
    }

    public function getArray()
    {
        return $this->array;
    }
}