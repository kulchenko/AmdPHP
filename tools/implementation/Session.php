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

namespace tools\implementation;

use tools\rules\ISession;

class Session implements ISession
{
    private $isSession = false;

    public function __construct()
    {
        if (! session_id() && empty($_SESSION)) {
            $this->isSession = session_start();
        }
    }

    public function setFlash($name, $value)
    {
        $_SESSION['flash'][$name] = $value;
    }

    public function getFlash($name, $default = null)
    {
        $result = $_SESSION['flash'][$name] ?? $default;
        $_SESSION['flash'] = [];
        return $result;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name, $default = null)
    {
        return $_SESSION[$name] ?? $default;
    }

    public function clear()
    {
        if ($this->isSession) {
            $_SESSION = [];
        }
    }

    public function stop()
    {
        if ($this->isSession) {
            session_destroy();
            $this->isSession = false;
        }
    }
}