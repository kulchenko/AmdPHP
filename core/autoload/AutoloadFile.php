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

namespace core\autoload;

class AutoloadFile
{
    private $filename;

    public function __construct($path, $className)
    {
        $this->filename = $path . DIRECTORY_SEPARATOR . $className . ".php";
    }

    public function load()
    {
        if (file_exists($this->filename)) return require_once $this->filename;
    }


}