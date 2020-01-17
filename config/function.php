<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Global function
 *
 * @package AmdPHP\Config\Function
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

function import (string $name)
{
    $factory = new \core\Factory();
    return $factory->get($name);
}

function app()
{
    \core\App::getInstance()->run();
}

function title()
{
    return \tools\implementation\Page::getInstance()->doAction('title');
}

function style()
{
    return \tools\implementation\Page::getInstance()->doAction('style');
}

function content()
{
    return \tools\implementation\Page::getInstance()->doAction('content');
}