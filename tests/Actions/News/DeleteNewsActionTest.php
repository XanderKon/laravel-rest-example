<?php

namespace Tests\Services\News\Actions;


use App\Actions\News\DeleteNewsAction;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteNewsActionTest extends TestCase
{
    use RefreshDatabase;

    public function testMethodWillDeleteNews(): void
    {
        $id = News::factory()->create()->id;

        $action = new DeleteNewsAction();

        $action->run($id);

        $this->assertCount(0, News::all());
    }

    public function testMethodCanDeleteMultipleNewsByTheirIds(): void
    {
        $ids = News::factory()->count(2)->create()->pluck('id')->toArray();

        $action = new DeleteNewsAction();

        $action->run($ids);

        $this->assertCount(0, News::all());
    }
}
