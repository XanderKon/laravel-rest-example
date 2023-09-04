<?php

namespace App\Services\News\Actions;

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
