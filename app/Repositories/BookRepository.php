<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends Repository
{
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
}
