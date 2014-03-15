<?php namespace GamingCalendar\Repos\Genre;

use GamingCalendar\Repos\DbRepository;
use Genre;

/**
 * Class DbRaffleRepository
 * @package Raffles\Repos\Raffle
 */
class DbGenreRepositoryInterface extends DbRepository implements GenreRepository {

    /**
     * @var Product
     */
    protected $model;

    /**
     * @param Raffle $model
     */
    public function __construct(Raffle $model)
    {
        $this->model = $model;
    }

}