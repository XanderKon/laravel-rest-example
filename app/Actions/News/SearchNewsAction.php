<?php

namespace App\Actions\News;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SearchNewsAction
{
    protected array $searchFieldWithSearchType = [
        'title' => 'ilike',
        'text' => 'ilike',
        'id' => '=',
        'slug' => '='
    ];

    public function run(array $data): Collection
    {
        $newsQueryBuilder = News::query();

        foreach ($data as $field => $value) {
            $this->addConstraints($field, $newsQueryBuilder, $value);
        }

        /**
         * @var Builder $newsQueryBuilder
         */
        return $newsQueryBuilder->get();
    }

    /**
     * @param string $field
     * @param Builder $newsQueryBuilder
     * @param string|array $value
     */
    protected function addConstraints(string $field, Builder $newsQueryBuilder, string|array $value): void
    {
        if (array_key_exists($field, $this->searchFieldWithSearchType)) {
            $searchBy = $value;

            if ($this->searchFieldWithSearchType[$field] === 'ilike') {
                $searchBy = "%$value%";
            }

            if (is_array($value)) {
                $newsQueryBuilder->whereIn($field, $searchBy);
            } else {
                $newsQueryBuilder->where($field, $this->searchFieldWithSearchType[$field], $searchBy);
            }
        }
    }
}
