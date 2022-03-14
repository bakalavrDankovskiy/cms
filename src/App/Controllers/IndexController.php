<?php

namespace App\Controllers;

use App\Models\Book;
use App\View\View;

class IndexController
{
    public function indexAction()
    {
        return new View('index', ['title' => 'Index Page']);
    }

    public function aboutAction()
    {
        return new View('index', ['title' => 'About Page']);
    }

    public function getBooksAction()
    {
        $books = Book::all()->toArray();
        return new View('books.index', $books);
    }

}