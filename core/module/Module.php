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

namespace core\module;

use core\App;
use core\exception\FileException;
use core\exception\ModuleException;

class Module
{
    private $amd;

    private $modules;
    private $method;

    private $configPath;
    private $configModules;

    public function __construct(App $amd, array $modules, callable $method)
    {
        $this->amd = $amd;
        $this->modules = $modules;
        $this->method = $method;

        $this->configPath = $amd->getConfig()->path;
        $this->configModules = $amd->getConfig()->modules;
    }

    public function execute()
    {
        $this->load();
        return call_user_func_array($this->method, $this->getModules());
    }

    private function load()
    {
        foreach ($this->modules as $name) {
            if (! $this->configModules->get($name)) throw new ModuleException($name);
            $this->import($this->getFile($name));
        }
    }

    private function import($file)
    {
        if(file_exists($file)) {
            return require_once $file;
        } else {
            throw new FileException($file);
        }
    }

    private function getFile($moduleName)
    {
        return $this->configPath->get('root') . $this->configModules->get($moduleName);
    }

    private function getModules()
    {
        $result = [];

        foreach ($this->modules as $name) {
            if ($this->amd->getModule($name)) {
                $result[] = $this->amd->getModule($name)->execute();
            }
        }

        return $result;
    }
}