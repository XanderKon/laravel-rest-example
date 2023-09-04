<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\DeleteNewsRequest;
use App\Http\Requests\News\SearchNewsRequest;
use App\Http\Requests\News\ShowNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\News\Actions\CreateNewsAction;
use App\Services\News\Actions\DeleteNewsAction;
use App\Services\News\Actions\SearchNewsAction;
use App\Services\News\Actions\UpdateNewsAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class NewsController
{
    public function create(CreateNewsRequest $request, CreateNewsAction $action): JsonResponse
    {
        return Response::json(
            [
                'message' => 'Новость создана',
                'data' => $action->run($request->validated())
            ],
            SymfonyResponse::HTTP_CREATED
        );
    }

    public function get(ShowNewsRequest $request): JsonResponse
    {
        return Response::json(['data' => News::find($request->id)]);
    }

    public function update(UpdateNewsRequest $request, UpdateNewsAction $action): JsonResponse
    {
        return Response::json([
            'message' => 'Новость обновлена',
            'data' => $action->run($request->validated())
        ]);
    }

    public function delete(DeleteNewsRequest $request, DeleteNewsAction $action): JsonResponse
    {
        return Response::json([
            'message' => 'Новость удалена',
            'data' => $action->run($request->validated())
        ]);
    }

    public function search(SearchNewsRequest $request, SearchNewsAction $action): JsonResponse
    {
        return Response::json(['data' => $action->run($request->validated())]);
    }
}
