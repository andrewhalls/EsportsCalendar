<?php namespace GamingCalendar\Repos\Match;

use GamingCalendar\Repos\DbRepository;
use GamingCalendar\models\Match;

/**
 * Class DbMatchRepository
 * @package GamingCalendar\Repos\Match
 */
class DbMatchRepository extends DbRepository implements MatchRepository
{
    /**
     * @var Team
     */
    protected $model;

    /**
     * @param Team $model
     */
    public function __construct(Match $model)
    {
        $this->model = $model;
    }

    public function lists($column, $key = null)
    {
        return $this->model
            ->lists($column, $key);
    }
}
