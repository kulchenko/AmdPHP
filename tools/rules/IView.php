<?php
namespace tools\rules;

interface IView
{
    public function render($filename, array $params = []);
}