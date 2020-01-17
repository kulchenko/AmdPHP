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

namespace core\components;

use core\IFile;

class LoadComponents implements ILoadComponents
{
    private $file;

    public function __construct(IFile $file)
    {
        $this->file = $file;
    }

    public function initialize(IComponents $components)
    {
        foreach ($this->file->getArray() as $name => $component) {
            if (! empty($name) && ! empty($component['class'])) {
                if (isset($component['params']) && is_array($component['params'])) {
                    $components->addComponent($name, $component['class'], $component['params']);
                } else {
                    $components->addComponent($name, $component['class']);
                }
            }
        }
    }
}