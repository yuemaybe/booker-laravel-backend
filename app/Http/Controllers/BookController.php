<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\Book\BookShowResource;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * BookService.
     *
     * @var BookService
     */
    protected $service;

    public function __construct(
        BookService $service
    ) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $books = $this->service->getBookPaginate();

        return $this->success($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request): JsonResponse
    {
        $this->service->createBook($request);

        return $this->success();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $book = $this->service->findOrNotFound($id);

        return $this->success(new BookShowResource($book));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id): JsonResponse
    {
        $this->service->updateBook($request, $id);

        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $book = $this->service->findOrNotFound($id);

        $book->delete();

        return $this->success();
    }
}
