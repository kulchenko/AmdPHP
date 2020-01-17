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

class AutoloadManager
{
    private $path;
    private $className;
    private $replaceClasses;

    public function __construct($path, $className, array $replaceClasses = [])
    {
        $this->className = $className;
        $this->path = $path;
        $this->replaceClasses = $replaceClasses;
    }

    public function getClassName()
    {
        return $this->getReplaceClass(trim(str_replace('/', '\\', $this->className), '\\/'));
    }

    public function getPath()
    {
        return trim($this->path, '\\/');
    }

    private function getReplaceClass($class)
    {
        if (isset($this->replaceClasses[$class])) return $this->replaceClasses[$class];
        return $class;
    }
}