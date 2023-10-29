<?php

namespace Domains\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'body' => 'string|required',
            'category_ids' => 'array|required',
            'category_ids.*' => 'string'
        ];
    }
}
