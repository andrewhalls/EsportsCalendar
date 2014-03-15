<?php namespace GamingCalendar\Repos\Game;

/**
 * Interface GameRepository
 * @package GamingCalendar\Repos\Game
 */
interface GameRepository
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
