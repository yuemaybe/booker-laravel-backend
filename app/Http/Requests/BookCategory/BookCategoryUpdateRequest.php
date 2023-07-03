<?php

namespace App\Http\Requests\BookCategory;

class BookCategoryUpdateRequest extends BookCategoryStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:book_categories,name,' . $this->route('book_category'),
        ];
    }
}
