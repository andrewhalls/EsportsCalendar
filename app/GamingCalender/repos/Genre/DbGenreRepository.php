<?php namespace GamingCalendar\Repos\Genre;

use GamingCalendar\Repos\DbRepository;
use GamingCalendar\models\Genre;

/**
 * Class DbGenreRepository
 * @package GamingCalendar\Repos\Genre
 */
class DbGenreRepository extends DbRepository implements GenreRepository
{
    /**
     * @var Genre
     */
    protected $model;

    /**
     * @param Genre $model
     */
    public function __construct(Genre $model)
    {
        $this->model = $model;
    }
}
