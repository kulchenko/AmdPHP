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

use tools\rules\IView;

class ViewSmarty implements IView
{
    private $smarty;

    public function __construct()
    {
        $path = dirname(dirname(__DIR__));

        $smarty = new \Smarty();
        $smarty->setTemplateDir( $path . '/view/smarty' );
        $smarty->setCompileDir( $path . '/view/smarty/compile' );
        $smarty->setConfigDir( $path . '/config/smarty' );
        $smarty->setCacheDir( $path . '/view/cache/smarty' );

        $smarty->caching = \Smarty::CACHING_LIFETIME_CURRENT;
        $smarty->debugging = false;

        $this->smarty = $smarty;
    }

    public function render($filename, array $params = [])
    {
        $this->smarty->assign($params);
        return  $this->smarty->fetch($filename);
    }
}