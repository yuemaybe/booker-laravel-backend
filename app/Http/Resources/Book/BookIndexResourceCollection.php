<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\ApiResourceCollection;

class BookIndexResourceCollection extends ApiResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = BookIndexResource::class;
}
