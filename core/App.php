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

use core\exception\ModuleException;
use core\module\Module;
use core\helper\ArrayCollection;

class App implements IApp
{
    private $collection;
    private $config;
    private static $__instance;

    private function __construct()
    {
        if (file_exists(FILE_CONFIG)) {
            $this->config = new Config(include(FILE_CONFIG));
        } else {
            throw new \Exception('No file config: ' . FILE_CONFIG);
        }

        $this->collection = new ArrayCollection();
    }

    public function add($name, array $modules, callable $method)
    {
        $this->collection->set($name, new Module($this, $modules, $method));
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getModule($name): Module
    {
        if ($this->collection->has($name)) {
            return $this->collection->get($name);
        } else {
            throw new ModuleException($name);
        }
    }

    public function run()
    {
        $this->getFile()->import();
        $module = $this->collection->get($this->config->app);
        return $module->execute();
    }

    private function getFile()
    {
        $fileName = $this->config->path->get('root') . $this->config->modules->get($this->config->app);
        return new File($fileName);
    }

    public static function getInstance()
    {
        if (self::$__instance == null) {
            self::$__instance = new self();
        }

        return self::$__instance;
    }
}