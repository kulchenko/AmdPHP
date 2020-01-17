<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Components to import
 *
 * @package AmdPHP\Config\Function
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

return [
    'view' => [
        'class' => \tools\implementation\View::class
    ],
    'url' => [
        'class' => \tools\implementation\Url::class
    ],
    'route' => [
        'class' => \tools\implementation\Route::class
    ],
    'request' => [
        'class' => \tools\implementation\Request::class
    ],
    'session' => [
        'class' => \tools\implementation\Session::class
    ],
    'db' => [
        'class' => \tools\implementation\MySQL::class,
        'params' => ['dbname', 'username', 'password', 'host?']
    ],
    'twig' => [
        'class' => \tools\implementation\ViewTwig::class
    ],
    'smarty' => [
        'class' => \tools\implementation\ViewSmarty::class
    ],
    'cmd' => [
        'class' => \tools\implementation\Cmd::class,
    ],
    'zimCmd' => [
        'class' => \tools\implementation\ZipCmd::class,
        'params' => ['cmd']
    ],
    'directory' => [
        'class' => \tools\implementation\Directory::class,
        'params' => [dirname(__DIR__)]
    ],
    'zip' => [
        'class' => \tools\implementation\Zip::class
    ]
];