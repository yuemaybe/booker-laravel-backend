<?php

namespace App\Repositories;

use App\Models\BookCategory;

class BookCategoryRepository extends Repository
{
    public function __construct(BookCategory $model)
    {
        $this->model = $model;
    }
}
