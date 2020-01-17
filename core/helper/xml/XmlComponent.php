<?php
/**
 * This file is part of the AmdPHP framework.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @package AmdPHP\Config
 * @author Kulchenko Ivan Sergeevich kulchenko_ivan@mail.ru
 * @copyright 2020-2080 The AmdPHP
 * @version 1.0, 17.01.2020
 */

namespace core\helper\xml;


class XmlComponent extends XmlParser
{
    public function getAuthorName()
    {
        return $this->xml->author->name;
    }

    public function getAuthorEmail()
    {
        return $this->xml->author->email;
    }

    public function getAuthorUrl()
    {
        return $this->xml->author->url;
    }

    public function getVersion()
    {
        return $this->xml->version;
    }

    public function getFiles()
    {
        return $this->xml->files;
    }
}