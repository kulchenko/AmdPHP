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

use core\exception\FileException;

class File
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function import()
    {
        if(file_exists($this->file)) {
            require_once $this->file;
        } else {
            throw new FileException($this->file);
        }
    }

    public function content()
    {
        if(file_exists($this->file)) {
            return file_get_contents($this->file);
        } else {
            throw new FileException($this->file);
        }
    }
}