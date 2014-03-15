<?php namespace GamingCalendar\Repos\Team;

use GamingCalendar\Repos\DbRepository;
use Team;

/**
 * Class DbTeamRepositoryInterface
 * @package GamingCalendar\Repos\Team
 */
class DbTeamRepositoryInterface extends DbRepository implements TeamRepository {

    /**
     * @var Team
     */
    protected $model;

    /**
     * @param Team $model
     */
    public function __construct(Team $model)
    {
        $this->model = $model;
    }

}