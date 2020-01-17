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

class Route extends Url
{
    public function isHome()
    {
        return empty($this->getPath());
    }

    public function isTour()
    {
        return $this->getPaths()->get(0) == 'tour';
    }

    public function isUser()
    {
        return $this->getPaths()->get(0) == 'user';
    }

    public function isTest()
    {
        return $this->getPaths()->get(0) == 'test';
    }

    public function isAjax()
    {
        return $this->getPaths()->get(0) == 'ajax';
    }
}