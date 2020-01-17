<?php
namespace tools\rules;

interface IUrl
{
    public function getPath();
    public function query($query);
    public function getParams(array $keys);
}