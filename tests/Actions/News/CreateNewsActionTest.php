<?php

namespace Tests\Services\News\Actions;

use App\Actions\News\CreateNewsAction;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNewsActionTest extends TestCase
{
    use RefreshDatabase;

    public function testMethodWillCreateNewNewsRecord(): void
    {
        News::truncate();

        $attributes = News::factory()->make()->toArray();

        $action = new CreateNewsAction();
        $action->run($attributes);

        $this->assertCount(1, News::all());
    }

    public function testMethodWillCreateNewNewsRecordWithTitleAndTextProvidedByUser(): void
    {
        News::truncate();

        $action = new CreateNewsAction();
        $action->run([
            'title' => 'test',
            'text' => 'test text'
        ]);

        $this->assertCount(1, News::all());
    }
}
