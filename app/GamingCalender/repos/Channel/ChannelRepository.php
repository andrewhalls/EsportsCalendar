<?php namespace GamingCalendar\Repos\Channel;

/**
 * Interface ChannelRepository
 * @package GamingCalendar\Repos\Channel
 */
interface ChannelRepository
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
