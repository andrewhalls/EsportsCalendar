<?php namespace GamingCalendar\Repos\Game;

use GamingCalendar\Repos\DbRepository;
use Game;

/**
 * Class DbRaffleRepository
 * @package Raffles\Repos\Raffle
 */
class DbGameRepositoryInterface extends DbRepository implements GameRepository {

    /**
     * @var Product
     */
    protected $model;

    /**
     * @param Raffle $model
     */
    public function __construct(Game $model)
    {
        $this->model = $model;
    }

}