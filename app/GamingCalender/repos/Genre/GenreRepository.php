<?php namespace GamingCalendar\Repos\Genre;

/**
 * Interface GenreRepository
 * @package GamingCalendar\Repos\Genre
 */
interface GenreRepository
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
