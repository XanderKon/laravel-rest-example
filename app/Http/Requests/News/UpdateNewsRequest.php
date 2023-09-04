<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['id' => "string[]", 'title' => "string[]", 'text' => "string[]"])]
    public function rules(): array
    {
        return [
            'id' => ['required', 'int'],
            'title' => ['bail', 'required', 'string', 'max:150'],
            'text' => ['bail', 'required', 'string', 'max:10000'],
        ];
    }
}
