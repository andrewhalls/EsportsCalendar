<?php namespace GamingCalendar\Repos\Channel;

use GamingCalendar\Repos\DbRepository;
use GamingCalendar\models\Channel;

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

    public function lists($column, $key = null)
    {
        return $this->model
            ->orderBy('name', 'ASC')
            ->lists($column, $key);
    }
}
