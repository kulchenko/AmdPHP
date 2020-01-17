<?php


namespace tools\implementation;


class Page
{
    private $actions;

    private static $__instance = null;

    private function __construct()
    {
    }

    public function addAction(string $tag, callable $function)
    {
        $this->actions[$tag] = $function;
    }

    public function doAction($tag)
    {
        if ($this->isAction($tag)) {
            $function = $this->getAction($tag);
            return call_user_func_array($function, []);
        }

        return null;
    }

    public function isAction($tag)
    {
        return isset($this->actions[$tag]);
    }

    public function getAction($tag)
    {
        return $this->actions[$tag];
    }

    public function render()
    {
        echo $this->doAction('init');
        echo $this->doAction('header');
        echo $this->doAction('content');
        echo $this->doAction('footer');
    }

    public static function getInstance()
    {
        if (self::$__instance == null) {
            self::$__instance = new self();
        }

        return self::$__instance;
    }
}