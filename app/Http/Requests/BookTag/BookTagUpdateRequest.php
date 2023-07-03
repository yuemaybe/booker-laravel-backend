<?php

namespace App\Http\Requests\BookTag;

class BookTagUpdateRequest extends BookTagStoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:book_tags,name,' . $this->route('book_tag'),
        ];
    }
}
