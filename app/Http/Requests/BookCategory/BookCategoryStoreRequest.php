<?php

namespace App\Http\Requests\BookCategory;

use App\Http\Requests\BaseRequest;

class BookCategoryStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:book_categories',
        ];
    }
}
