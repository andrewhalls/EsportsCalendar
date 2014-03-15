<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Game\DbGameRepositoryInterface;

class Game extends \Eloquent implements DbGameRepositoryInterface
{

    public $table = 'game';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
