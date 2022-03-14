<?php

namespace App;

use App\View\Renderable;
use App\Exception\HttpException;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    public function run()
    {
        try {
            $result = $this->router->dispatch();
            if ($result instanceof Renderable) {
                $result->render();
            } else {
                echo $result;
            }
        } catch (HttpException $e) {
            $this->renderException($e);
        }
    }

    private function renderException(HttpException $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            echo '<pre>';
            echo 'Код ошибки ' . $e->getCode() ?? 500;
            echo 'Текст ошибки ' . $e->getMessage();
            echo '</pre>';
        }
    }

    private function initialize()
    {
        $capsule = new Capsule();
        $capsule->addConnection(getDbConfigs());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}

