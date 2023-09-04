<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['title' => "string[]", 'text' => "string[]"])]
    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', 'max:150'],
            'text' => ['bail', 'required', 'string', 'max:10000'],
        ];
    }
}
