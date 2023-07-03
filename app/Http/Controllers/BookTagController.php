<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookTag\BookTagStoreRequest;
use App\Http\Requests\BookTag\BookTagUpdateRequest;
use App\Http\Resources\BookTag\BookTagResource;
use App\Services\BookTagService;
use Illuminate\Http\JsonResponse;

class BookTagController extends Controller
{
    /**
     * BookTagService.
     *
     * @var BookTagService
     */
    protected $service;

    public function __construct(
        BookTagService $service
    ) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tags = $this->service->all();

        return $this->success(BookTagResource::collection($tags));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookTagStoreRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return $this->success();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookTagUpdateRequest $request, string $id): JsonResponse
    {
        $tag = $this->service->findOrNotFound($id);

        $tag->update($request->validated());

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $tag = $this->service->findOrNotFound($id);

        $tag->delete();

        return $this->success();
    }
}
