<?php namespace GamingCalendar\Repos\Broadcast;

use GamingCalendar\Repos\DbRepository;
use Broadcast;

/**
 * Class DbBroadcastRepositoryInterface
 * @package GamingCalendar\Repos\Broadcast
 */
class DbBroadcastRepositoryInterface extends DbRepository implements BroadcastRepository
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