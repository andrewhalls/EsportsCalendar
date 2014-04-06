<?php namespace GamingCalendar\Repos;

/**
 * Class DbRepository
 * @package GamingCalendar\Repos
 */
abstract class DbRepository
{

    /**
     * Eloquent model
     */
    protected $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Fetch a record by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Fetch a record by id
     *
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getRules()
    {
        return $this->model->rules;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function instance()
    {
        return $this->model;
    }

    /**
     * Fetch all records
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    public function lists($column, $key = null)
    {
        return $this->model->lists($column, $key = null);
    }
}
