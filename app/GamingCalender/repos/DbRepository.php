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
     * Fetch all records
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }
}
