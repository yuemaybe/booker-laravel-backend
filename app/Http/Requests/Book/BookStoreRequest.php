<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\BaseRequest;

class BookStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'book_category_id' => 'required|string|exists:book_categories,id',
            'book_tag_ids' => 'nullable|array',
            'book_tag_ids.*' => 'nullable|string|exists:book_tags,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string|max:255',
        ];
    }
}
