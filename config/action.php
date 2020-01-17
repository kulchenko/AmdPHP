<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Changes to events on the page
 *
 * @package AmdPHP\Config
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

$page = \tools\implementation\Page::getInstance();

$page->addAction('style', function (){
    return "<link rel='stylesheet' href='assets/css/style.css'>";
});

$page->addAction('title', function (){
    return 'AmdPHP tytytytytyyty';
});

$page->addAction('content', function (){
    $view = import('view');
    return $view->render('content.html.twig', ['content' => 'Welcome. You can with AmdPHP framework']);
});
