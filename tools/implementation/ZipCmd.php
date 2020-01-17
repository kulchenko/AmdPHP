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


class ZipCmd
{
    private $arrayCollection;

    public function __construct(Cmd $cmd)
    {
        $this->arrayCollection = $cmd->getArrayCollection();
    }

    public function getPath()
    {
        return $this->arrayCollection->get('path');
    }
}