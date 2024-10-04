<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    protected $app;

    protected $primaryKey = 'id';

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function getFieldsSearchable();

    abstract public function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (! $model instanceof Model)
        {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();
        return $query->paginate($perPage, $columns);
    }

    public function allQuery($search = [], $skip = null, $limit = null, $relations = [], $sortBy = 'DESC')
    {
        $query = $this->model->newQuery();

        if (count($relations))
        {
            $query->with($relations);
        }

        if (count($search))
        {
            foreach ($search as $key => $value)
            {
                if (in_array($key, $this->getFieldsSearchable()))
                {
                    $query->where($key, $value);
                }
            }
        }

        if (! is_null($skip))
        {
            $query->skip($skip);
        }

        if (! is_null($limit))
        {
            $query->limit($limit);
        }

        $query->orderBy($this->primaryKey, $sortBy);

        return $query;
    }

    public function getAll($search = [], $skip = null, $limit = null, $relations = [], $columns = ['*'], $sortBy = 'DESC')
    {
        $query = $this->allQuery($search, $skip, $limit, $relations, $sortBy);
        return $query->get($columns);
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $model->save();

        return $model;
    }

    public function find($id, $columns = ['*'],  $relations = [])
    {
        $query = $this->model->newQuery();

        if (count($relations))
        {
            $query->with($relations);
        }

        return $query->find($id, $columns);
    }

    public function update($input, $id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);

        $model->fill($input);
        $model->save();

        return $model;
    }

    public function delete($id)
    {
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        return $model->delete();
    }

    public function countAll($relations = [])
    {
        $query = $this->model->newQuery();

        if (count($relations))
        {
            $query->with($relations);
        }

        return $query->count();
    }

    public function countCurrentMonth()
    {
        $query = $this->model->newQuery();
        return $query->whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();
    }
}
