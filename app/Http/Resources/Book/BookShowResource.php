<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Request;

class BookShowResource extends BookResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request) + [
            'description' => $this->description,
        ];
    }
}
