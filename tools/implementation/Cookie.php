<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Contains the project name, project modules, and paths
 *
 * @package AmdPHP\Config
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

namespace core;

class Cookie
{
    private $cookie;

    public function __construct()
    {
        $this->cookie = $this->cleanInput($_COOKIE);
    }

    public function set($name, $value, $minutes = 60)
    {
        setcookie($name, $value, time() + ($minutes * 60), "/", "", 0);
    }

    public function get($name, $default = null)
    {
        return $this->cookie[$name] ?? $default;
    }

    public function remove($name)
    {
        setcookie($name, "", time() - 60, "/","", 0);
    }

    private function cleanInput($data) {
        if (is_array($data)) {
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }

        return trim(htmlspecialchars(preg_replace('/[^a-zA-ZА-Яа-я0-9\s\-\_]/ui', '', $data), ENT_QUOTES));
    }
}