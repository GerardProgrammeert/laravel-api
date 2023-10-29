<?php

namespace Domains\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'description' => 'string|required',
        ];
    }
}