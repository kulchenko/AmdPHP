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
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class ViewTwig implements IView
{
    private $twig;

    public function __construct()
    {
        $path = dirname(dirname(__DIR__));
        $loader = new FilesystemLoader($path . '/view/twig');
        $this->twig = new Environment($loader, [
            'cache' => $path . '/view/cache/twig',
            'debug' => true
        ]);
        $this->twig->addFunction(new TwigFunction('style', 'style'));
        $this->twig->addFunction(new TwigFunction('content', 'content'));
        $this->twig->addFunction(new TwigFunction('title', 'title'));
    }

    public function render($filename, array $params = [])
    {
        return $this->twig->render($filename, $params);
    }
}