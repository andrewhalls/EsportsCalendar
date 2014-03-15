<?php namespace GamingCalendar\Repos\Channel;

use GamingCalendar\Repos\DbRepository;
use Channel;

/**
 * Class DbChannelRepository
 * @package GamingCalendar\Repos\Channel
 */
class DbChannelRepository extends DbRepository implements ChannelRepository
{

    /**
     * @var Channel
     */
    protected $model;

    /**
     * @param Channel $model
     */
    public function __construct(Channel $model)
    {
        $this->model = $model;
    }
}
