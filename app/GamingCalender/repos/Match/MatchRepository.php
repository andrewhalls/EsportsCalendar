<?php namespace GamingCalendar\Repos\Match;

/**
 * Interface MatchRepository
 * @package GamingCalendar\Repos\Match
 */
interface MatchRepository
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
