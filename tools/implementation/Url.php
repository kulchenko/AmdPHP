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

use core\helper\ArrayCollection;
use core\Params;
use tools\rules\IUrl;

class Url implements IUrl
{
    private $url;

    public function __construct()
    {
        $this->url = filter_input(INPUT_SERVER, 'REQUEST_URI');
    }

    public function getPath()
    {
        return trim(parse_url($this->url, PHP_URL_PATH), '/');
    }

    public function getPaths()
    {
        return new ArrayCollection(explode('/', $this->getPath()));
    }

    public function query($query)
    {
        return preg_match("~{$query}~", $this->url);
    }

    public function getParams(array $keys)
    {
        return new Params($keys, explode('/', $this->getPath()));
    }

    public function isHome()
    {
        return empty($this->getPath());
    }
}