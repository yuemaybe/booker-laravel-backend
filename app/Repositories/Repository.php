<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Repository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Return new query.
     */
    public function newQuery(): Builder
    {
        return $this->model->newQuery();
    }

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    public function create($attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes, array $options = []): Model
    {
        $instance = $this->model->findOrFail($id);

        $instance->update($attributes, $options);

        return $instance;
    }

    public function find(int $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function get(array $columns = ['*']): Collection
    {
        return $this->model->get($columns);
    }

    public function paginate(array $columns = ['*'], int $perPage = null): LengthAwarePaginator
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @return int
     *
     * @internal param $id
     */
    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }
}
