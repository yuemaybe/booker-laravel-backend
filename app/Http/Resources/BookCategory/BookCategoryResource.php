<?php

namespace App\Http\Resources\BookCategory;

use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;

class BookCategoryResource extends ApiResource
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
            'name' => $this->name,
        ];
    }
}
