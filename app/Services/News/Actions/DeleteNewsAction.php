<?php

namespace App\Services\News\Actions;

use App\Models\News;

class DeleteNewsAction
{
    public function run(array|int $id): int
    {
        !is_array($id) ? $ids[] = $id : $ids = $id;

        return News::whereIn('id', $ids)->delete();
    }
}
