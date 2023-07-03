<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return $this->paginateRules();
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw (new ApiValidationException($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    // }

    protected function paginateRules(): array
    {
        return [
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
        ];
    }
}
