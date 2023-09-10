<?php

namespace App\Actions\News;

use App\Models\News;
use Illuminate\Support\Str;
use function tap;

class UpdateNewsAction
{
    public function run(array $attributes): ?News
    {
        $attributes['slug'] = Str::slug($attributes['slug']);

        $news = News::find($attributes['id']);

        if ($news) {
            tap($news, static fn($model) => $model->update($attributes));
        }

        return $news;
    }
}
