<?php namespace GamingCalendar\Repos\Team;

use GamingCalendar\Repos\DbRepository;
use GamingCalendar\models\Team;

/**
 * Class DbTeamRepository
 * @package GamingCalendar\Repos\Team
 */
class DbTeamRepository extends DbRepository implements TeamRepository
{
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