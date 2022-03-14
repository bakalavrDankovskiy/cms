<?php

namespace App\Exception;

use App\View\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    protected $message = 'Запрошенному url не соответствует ни один установленный маршрут (Route)';
    protected $code = 125;

    public function render()
    {
        echo "<br><h1>Код ошибки: {$this->getCode()}, текст ошибки: {$this->getMessage()}</h1></br>";
    }
}