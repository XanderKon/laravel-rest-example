<?php

namespace App\Actions\News;

use App\Models\News;

class DeleteNewsAction
{
    public function run(array|int $id): int
    {
        !is_array($id) ? $ids[] = $id : $ids = $id;

        return News::whereIn('id', $ids)->delete();
    }
}
