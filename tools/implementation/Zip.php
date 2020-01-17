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


class Zip
{
    public function get($source, $destination)
    {
        if (extension_loaded('zip')) {
            if (file_exists($source)) {
                $zip = new \ZipArchive();
                if ($zip->open($destination, \ZIPARCHIVE::CREATE | \ZIPARCHIVE::OVERWRITE)) {
                    $source = realpath($source);
                    if (is_dir($source)) {
                        $iterator = new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS);
                        $files = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);
                        foreach ($files as $file) {
                            $file = realpath($file);
                            if (is_dir($file)) {
                                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                            } else {
                                if (is_file($file)) {
                                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                                }
                            }
                        }
                    } else {
                        if (is_file($source)) {
                            $zip->addFromString(basename($source), file_get_contents($source));
                        }
                    }
                }
                echo $destination . ' zip: successfully...';
                echo "\n";
                return $zip->close();
            }
        }
        return false;
    }
}