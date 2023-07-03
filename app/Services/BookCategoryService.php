<?php

namespace App\Services;

use App\Repositories\BookCategoryRepository;

class BookCategoryService extends Service
{
    /**
     * BookCategoryRepository.
     *
     * @var BookCategoryRepository
     */
    protected $repository;

    public function __construct(
        BookCategoryRepository $repository
    ) {
        $this->repository = $repository;
    }
}
