<?php namespace GamingCalendar\Repos\Game;

interface GameRepository
{

    /**
     * Fetch a record by id
     *
     * @param $id
     */
    public function find($id);

    public function all();
}
