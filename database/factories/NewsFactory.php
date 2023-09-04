<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class NewsFactory extends Factory
{
    protected $model = News::class;

    #[ArrayShape([
        'title' => "string",
        'text' => "string",
        'slug' => "string",
        'created_at' => Carbon::class,
        'updated_at' => Carbon::class
    ])]
    public function definition(): array
    {
        $time = Carbon::now();

        return [
            'title' => $this->faker->title,
            'text' => $this->faker->text,
            'slug' => $this->faker->slug,
            'created_at' => $time,
            'updated_at' => $time
        ];
    }
}
