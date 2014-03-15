<?php namespace GamingCalendar\Repos\Game;

use GamingCalendar\Repos\DbRepository;
use Game;

/**
 * Class DbGameRepository
 * @package GamingCalendar\Repos\Game
 */
class DbGameRepository extends DbRepository implements GameRepository
{
    /**
     * @var Game
     */
    protected $model;

    /**
     * @param Game $model
     */
    public function __construct(Game $model)
    {
        $this->model = $model;
    }
}