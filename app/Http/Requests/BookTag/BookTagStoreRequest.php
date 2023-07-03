<?php

namespace App\Http\Requests\BookTag;

use App\Http\Requests\BaseRequest;

class BookTagStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:book_tags',
        ];
    }
}
