<?php

namespace Router;

class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->action = $action;
        $this->path = trim($path, '/');
    }
    public function matches(string $url)
    {

        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = array_slice($matches, 1, count($matches) - 1, false);
            return true;
        }

        return false;
    }
    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0]();
        $method = $params[1];
        isset($this->matches[1]) ? $controller->$method($this->matches) : $controller->$method();
    }
}
