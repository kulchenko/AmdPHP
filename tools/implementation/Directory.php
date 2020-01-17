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


class Directory
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getFiles()
    {
        $files = [];

        foreach (new \DirectoryIterator($this->path) as $fileInfo) {
            if($fileInfo->isDot() or $fileInfo->isDir()) continue;
            $files[] = $fileInfo;
        }

        return $files;
    }

    public function getDirects()
    {
        $directs = [];

        foreach (new \DirectoryIterator($this->path) as $fileInfo) {
            if($fileInfo->isDot()) continue;
            if ($fileInfo->isDir()) {
                $directs[] = $fileInfo;
            }
        }

        return $directs;
    }

    public function getRecursiveDirectory()
    {
        $directory = new \RecursiveDirectoryIterator($this->path, \RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new \RecursiveIteratorIterator($directory, \RecursiveIteratorIterator::CHILD_FIRST);
        $files = array();

        foreach ($iterator as $info) {
            if ($info->isDir()) {
                $files[] = $info;
            }
        }

        return $files;
    }

    public function getRecursiveFiles()
    {
        $directory = new \RecursiveDirectoryIterator($this->path, \RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new \RecursiveIteratorIterator($directory, \RecursiveIteratorIterator::CHILD_FIRST);
        $files = array();

        foreach ($iterator as $info) {
            if ($info->isFile()) {
                $files[] = $info;
            }
        }

        return $files;
    }
}