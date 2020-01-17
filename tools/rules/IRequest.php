<?php
namespace tools\rules;

interface IRequest
{
    public function get($key, $default = null);
    public function isMethod($name);
    public function all();
    public function has($name);
    public function only(array $data = []);
    public function except(array $data = []);
}