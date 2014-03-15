<?php namespace GamingCalendar\Repos\Channel;

interface ChannelRepository {

    /**
     * Fetch a record by id
     *
     * @param $id
     */
    public function find($id);

    public function all();
}
