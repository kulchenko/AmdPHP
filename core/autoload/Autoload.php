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

require_once 'AutoloadFile.php';
require_once 'AutoloadManager.php';

class Autoload
{
    private $path;
    private $replaceClasses;

    public function __construct($path, array $replaceClasses = [])
    {
        $this->path = $path;
        $this->replaceClasses = $replaceClasses;
    }

    public function register()
    {
        spl_autoload_register([$this, 'connect']);
    }

    private function connect ($className) {
        $autoloadManager = new AutoloadManager($this->path, $className, $this->replaceClasses);
        $autoloadFile = new AutoloadFile($autoloadManager->getPath(), $autoloadManager->getClassName());
        $autoloadFile->load();
    }


}