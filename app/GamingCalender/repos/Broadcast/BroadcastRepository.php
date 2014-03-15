<?php namespace GamingCalendar\Repos\Broadcast;

/**
 * Interface BroadcastRepository
 * @package GamingCalendar\Repos\Broadcast
 */
interface BroadcastRepository
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
