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

return [
    'app' => 'main',
    'modules' => [
        'main' => '/modules/main.php',
    ],
    'path' => [
        'config' =>  __DIR__,
        'root' => dirname(__DIR__),
        'core' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core',
        'view' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view',
        'log' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'log',
        'modules' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'modules',
        'cache' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache'
    ],
];
