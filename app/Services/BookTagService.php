<?php

namespace App\Services;

use App\Repositories\BookTagRepository;

class BookTagService extends Service
{
    /**
     * BookTagRepository.
     *
     * @var BookTagRepository
     */
    protected $repository;

    public function __construct(
        BookTagRepository $repository
    ) {
        $this->repository = $repository;
    }
}
