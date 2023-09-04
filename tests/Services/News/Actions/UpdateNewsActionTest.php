<?php

namespace Tests\Services\News\Actions;


use App\Models\News;
use App\Services\News\Actions\UpdateNewsAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateNewsActionTest extends TestCase
{
    use RefreshDatabase;

    public function testMethodCanUpdateNewsAndWillReturnIt(): void
    {
        $this->travel(-1)->days();
        $previouslyCreatedNews = News::factory()->create();
        $newsId = $previouslyCreatedNews->id;
        $previousUpdatedAtTime = $previouslyCreatedNews->updated_at;
        $this->travelBack();

        $data = News::factory()->make()->toArray();
        $data['id'] = $newsId;
        unset($data['created_at'], $data['updated_at']);

        $action = new UpdateNewsAction();

        $result = $action->run($data)->toArray();
        $newUpdatedAt = $result['updated_at'];
        unset($result['created_at'], $result['updated_at']);

        $this->assertEquals($data, $result);
        $this->assertNotEquals($previousUpdatedAtTime, $newUpdatedAt);
    }

    public function testMethodWillReturnNullIfNewsCanNotBeFound(): void
    {
        $attributes = News::factory()->make()->toArray();
        $attributes['id'] = PHP_INT_MAX;

        $action = new UpdateNewsAction();

        $this->assertNull($action->run($attributes));
    }
}
