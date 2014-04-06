<?php namespace GamingCalendar\Repos\Broadcast;

/**
 * Interface BroadcastRepository
 * @package GamingCalendar\Repos\Broadcast
 */
interface BroadcastRepository
{

    /**
     * Get all records.
     */
    public function all();

    /**
     * Get an overview of upcoming / expired broadcasts
     *
     * @param $days
     * @return mixed
     */
    public function getOverview($days);

    /**
     * Get an overview of upcoming  broadcasts
     *
     * @param $days
     * @return mixed
     */
    public function getUpcoming($days);

    /**
     * Get an overview of completed broadcasts
     *
     * @param $days
     * @return mixed
     */
    public function getCompleted($days);
}
