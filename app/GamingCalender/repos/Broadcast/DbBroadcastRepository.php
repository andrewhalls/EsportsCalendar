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
    protected $model;

    /**
     * @param Broadcast $model
     */
    public function __construct(Broadcast $model)
    {
        $this->model = $model;
    }
}
