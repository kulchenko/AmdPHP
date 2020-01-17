<?php
namespace tools\rules;

interface ISession
{
    public function setFlash($name, $value);
    public function getFlash($name, $default = null);
    public function set($name, $value);
    public function get($name, $default = null);
    public function clear();
    public function stop();
}