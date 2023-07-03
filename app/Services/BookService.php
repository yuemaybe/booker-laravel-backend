<?php

namespace App\Services;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\Book\BookIndexResourceCollection;
use App\Repositories\BookRepository;
use Illuminate\Support\Arr;

class BookService extends Service
{
    /**
     * BookRepository.
     *
     * @var BookRepository
     */
    protected $repository;

    public function __construct(
        BookRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * 取得所有書籍分頁.
     */
    public function getBookPaginate(): BookIndexResourceCollection
    {
        $books = $this->repository->paginate();

        $books->load(['bookCategory', 'bookTags']);

        return new BookIndexResourceCollection($books);
    }

    /**
     * 建立書本.
     */
    public function createBook(BookStoreRequest $request): void
    {
        $attributes = $request->validated();

        $book = $this->create(Arr::except($attributes, ['book_tag_ids']));

        $book->bookTags()->sync(Arr::get($attributes, 'book_tag_ids', []));
    }

    /**
     * 更新書本.
     */
    public function updateBook(BookUpdateRequest $request, string $id): void
    {
        $book = $this->findOrNotFound($id);

        $attributes = $request->validated();

        $book->update(Arr::except($attributes, ['book_tag_ids']));

        $book->bookTags()->sync(Arr::get($attributes, 'book_tag_ids', []));
    }
}
