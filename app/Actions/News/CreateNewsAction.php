<?php

namespace App\Actions\News;

use App\Models\News;
use Illuminate\Support\Str;

class CreateNewsAction
{
    public function run(array $attributes): News
    {
        $attributes['slug'] = Str::slug($attributes['title']);

        return News::create($attributes);
    }
}
