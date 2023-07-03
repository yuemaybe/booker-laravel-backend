<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    /**
     * Repository.
     *
     * @var Repository
     */
    protected $repository;

    public function __call($method, $arguments)
    {
        if (method_exists($this->repository, $method)) {
            return call_user_func_array([$this->repository, $method], $arguments);
        }
    }

    public function findOrNotFound(string $id): Model
    {
        throw_if(!$model = $this->find($id), NotFoundException::class);

        return $model;
    }
}
