<?php

namespace App\View;

class View implements Renderable
{
    public $query;
    public $params;

    public function __construct($query, $params)
    {
        $this->query = $this->queryFormatter($query);
        $this->params = $params;
    }

    public function render()
    {
        $view = APP_DIR . DS . 'view' . DS . $this->query . '.php';
        if (file_exists($view)) {
            $params = $this->params;
            require $view;
        }
    }

    private function queryFormatter(string $query)
    {
        $query = str_replace('.', DS, $query);
        return $query;
    }
}