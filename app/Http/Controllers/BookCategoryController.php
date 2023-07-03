<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCategory\BookCategoryStoreRequest;
use App\Http\Requests\BookCategory\BookCategoryUpdateRequest;
use App\Http\Resources\BookCategory\BookCategoryResource;
use App\Services\BookCategoryService;
use Illuminate\Http\JsonResponse;

class BookCategoryController extends Controller
{
    /**
     * BookCategoryService.
     *
     * @var BookCategoryService
     */
    protected $service;

    public function __construct(
        BookCategoryService $service
    ) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = $this->service->all();

        return $this->success(BookCategoryResource::collection($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCategoryStoreRequest $request): JsonResponse
    {
        $this->service->create($request->validated());

        return $this->success();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCategoryUpdateRequest $request, string $id): JsonResponse
    {
        $category = $this->service->findOrNotFound($id);

        $category->update($request->validated());

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $category = $this->service->findOrNotFound($id);

        $category->delete();

        return $this->success();
    }
}
