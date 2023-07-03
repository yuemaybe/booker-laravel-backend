<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\ApiResource;
use App\Http\Resources\BookCategory\BookCategoryResource;
use Illuminate\Http\Request;

class BookResource extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => new BookCategoryResource($this->bookCategory),
            'name' => $this->name,
            'price' => $this->price,
            'tags' => $this->present()->bookTags,
        ];
    }
}
