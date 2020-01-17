<?php
use core\App;

$app = App::getInstance();

$app->add('main', [], function ($path){
    $view = import('view');
    echo $view->render('index.html.twig', ['title' => 'Amd framework', 'content' => 'Welcome. You can with AmdPHP framework']);
});