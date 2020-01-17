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


use core\helper\ArrayCollection;

class Cmd
{
    private $argv;

    public function __construct()
    {
        $this->argv = $_SERVER['argv'];
    }

    public function getArrayCollection()
    {
        $result = new ArrayCollection();

        foreach ($this->argv as $key => $value) {

            if ($key == 0) {
                $result->set('file', $value);
                continue;
            }

            $e = explode("=", $value);

            if(count($e)==2) {
                $result->set($e[0], $e[1]);
            } else {
                $result->set($e[0], 0);
            }
        }

        return $result;
    }
}