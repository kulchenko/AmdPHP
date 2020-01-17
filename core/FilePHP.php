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

class FilePHP implements IFile
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function getArray()
    {
        $filename = trim(new CorePath()) . DIRECTORY_SEPARATOR . trim($this->filename) . '.php';
        return include($filename);
    }
}