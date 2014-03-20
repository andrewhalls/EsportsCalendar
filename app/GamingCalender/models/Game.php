<?php namespace GamingCalendar\models;

/**
 * Class Game
 * @package GamingCalendar\models
 */
class Game extends \Eloquent
{

    public $table = 'game';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];
}
