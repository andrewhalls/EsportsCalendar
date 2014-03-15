<?php namespace GamingCalendar\Repos\Genre;

interface GenreRepository {

    /**
     * Fetch a record by id
     *
     * @param $id
     */
    public function find($id);

    public function all();
}
