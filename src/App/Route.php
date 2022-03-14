<?php

namespace App;

class Route
{
    //http запрос, для которого подходит маршрут get или post
    private $method;

    //uri маршрута
    private $path;

    //callback - маршрута
    private $callback;

    //Параметры, переданны в URL
    private $urlParams;

    public function __construct($method, $path, $callback)
    {
        $this->path = '/' . trim($path, '/');
        $this->method = $method;
        $this->callback = $callback;
    }

    public function run()
    {
        if (!empty($this->urlParams)) {
            return call_user_func_array($this->prepareCallback($this->callback), $this->urlParams);
        } else {
            return call_user_func($this->prepareCallback($this->callback));
        }
    }

    public function match($method, $uri)
    {
        if ($method !== $this->method) {
            return false;
        } elseif ($this->uriPatternMatchAndGetParams($uri)) {
            return true;
        } else {
            return false;
        }
    }

    private function prepareCallback($callback)
    {
        if (is_callable($callback)) {
            return $callback;
        } else {
            $funcArray = explode('@', $callback);
            $controllerClass = $funcArray[0];
            $controllerMethod = $this->getAction($funcArray[1]);
            return [new $controllerClass(), $controllerMethod];
        }
    }

    private function getPath()
    {
        return $this->path;
    }

    private function uriPatternMatchAndGetParams($uri)
    {
        $pattern = '/^' . str_replace(['*', '/'], ['(\w+)', '\/'], trim($this->getPath(), '/')) . '(\/)?$/';
        $uri = trim($uri, '/');
        $uriPatternMatch = preg_match($pattern, $uri, $result);
        if ($uriPatternMatch) {
            if (count($result) > 1) {
                $paramsFromUrl = [];
                for ($i = 1; $i < count($result); $i++) {
                    $paramsFromUrl[] = $result[$i];
                }
                $this->urlParams = $paramsFromUrl;
            }
            return true;
        }
        return false;
    }

    private function getAction($action)
    {
        $action = ucwords($action, '.');
        $action = str_replace('.', '', $action);
        $action = lcfirst($action);
        $action .= 'Action';
        return $action;
    }
}
