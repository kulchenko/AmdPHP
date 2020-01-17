<?php
use core\App;

$app = App::getInstance();

$app->add('main', [], function (){
    $view = import('view');
    echo $view->render('index.html.twig');
});