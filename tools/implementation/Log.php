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

use tools\rules\ILog;

class Log implements ILog
{
    private $file;
    private $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
        $path = dirname(dirname(__DIR__));
        $this->file = $path . "/log/" . date('d.m.Y_H.i.s') . ".txt";
        echo $this->file;
    }

    private function message($isHTML = false)
    {
        $end = $isHTML ? "<br>": "\n";
        $message = 'Message: ' . $this->exception->getMessage() . $end;
        $message .= 'File: ' . $this->exception->getFile() . $end;
        $message .= 'Line: ' . $this->exception->getLine() . $end;
        $message .= 'TraceAsString: '. $this->exception->getTraceAsString() . $end;
        return $message;
    }

    public function save()
    {
        file_put_contents($this->file, $this->message());
    }

    public function output()
    {
        return $this->message(true);
    }
}