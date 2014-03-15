<?php namespace GamingCalendar\Repos\Team;

interface TeamRepository
{
    /**
     * Fetch a record by id
     *
     * @param $id
     */
    public function find($id);

    /**
     * Get all records.
     */
    public function all();
}
