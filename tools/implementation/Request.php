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

use tools\rules\IRequest;

class Request implements IRequest
{
    private $request;

    public function __construct()
    {
        $this->request = $this->cleanInput(array_merge($_GET, $_POST));
    }

    public function get($key, $default = null)
    {
        return $this->request[$key] ??  $default;
    }

    public function isMethod($name)
    {
        return $_SERVER['REQUEST_METHOD'] == mb_strtoupper($name);
    }

    public function all()
    {
        return $this->request;
    }

    public function has($name)
    {
        return isset($this->request[$name]);
    }

    public function only(array $data = [])
    {
        return $this->filter($data, function ($key, $data){
            return in_array($key, $data);
        });
    }

    public function except(array $data = [])
    {
        return $this->filter($data, function ($key, $data){
            return ! in_array($key, $data);
        });
    }

    public function filter(array $data, callable $func)
    {
        $result = [];

        foreach ($this->request as $key => $value) {
            if ($func($key, $data)) $result[$key] = $value;
        }

        return $result;
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