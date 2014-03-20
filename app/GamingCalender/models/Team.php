<?php namespace GamingCalendar\models;

/**
 * Class Team
 * @package GamingCalendar\models
 */
class Team extends \Eloquent
{

    public $table = 'team';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];
}
