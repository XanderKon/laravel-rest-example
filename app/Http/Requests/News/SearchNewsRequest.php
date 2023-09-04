<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class SearchNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['id' => "string[]", 'title' => "string[]", 'text' => "string[]", 'slug' => "string[]"])]
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'int'],
            'title' => ['sometimes', 'string'],
            'text' => ['sometimes', 'string'],
            'slug' => ['sometimes', 'string'],
        ];
    }
}
