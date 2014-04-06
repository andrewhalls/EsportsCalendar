<?php namespace GamingCalendar\Repos\Broadcast;

use GamingCalendar\Repos\DbRepository;
use GamingCalendar\models\Broadcast;

/**
 * Class DbBroadcastRepository
 * @package GamingCalendar\Repos\Broadcast
 */
class DbBroadcastRepository extends DbRepository implements BroadcastRepository
{
    /**
     * @var Broadcast
     */
    public $model;

    /**
     * @param Broadcast $model
     */
    public function __construct(Broadcast $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $days
     * @return mixed|void
     */
    public function getOverview($days)
    {
        return $this->model
            ->overview($days)
            ->orderBy('start_at', 'ASC')
            ->get();
    }

    public function getBroadcasting()
    {
        return $this->model
            ->broadcasting
            ->with('game')
            ->get();
    }

    /**
     * Get an overview of upcoming  broadcasts
     *
     * @param $days
     * @return mixed
     */
    public function getUpcoming($days = 3)
    {
        return $this->model
            ->upcoming($days)
            ->orderBy('start_at', 'ASC')
            ->get();
    }

    /**
     * Get an overview of completed broadcasts
     *
     * @param $days
     * @return mixed
     */
    public function getCompleted($days = 3)
    {
        return $this->model
            ->completed($days)
            ->orderBy('start_at', 'ASC')
            ->get();
    }
}
