<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ShowNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['id' => "string"])]
    public function rules(): array
    {
        return [
            'id' => ['bail', 'required', 'int']
        ];
    }
}
