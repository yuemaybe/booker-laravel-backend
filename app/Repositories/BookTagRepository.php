<?php

namespace App\Repositories;

use App\Models\BookTag;

class BookTagRepository extends Repository
{
    public function __construct(BookTag $model)
    {
        $this->model = $model;
    }
}
