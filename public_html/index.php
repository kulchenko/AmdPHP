<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Initializing and starting systems
 *
 * @package AmdPHP\Config\Function
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

use core\App;

try {
    app();
} catch (\Exception $e) {
    $log = new \tools\implementation\Log($e);
    $log->save();
    $log->output();
}

