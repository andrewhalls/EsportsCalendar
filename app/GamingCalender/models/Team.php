<?php namespace GamingCalendar\models;

/**
 * Class Team
 * @package GamingCalendar\models
 */
class Team extends \Eloquent
{

    public $table = 'team';

    // Add your validation rules here
    public $rules = [
         'name' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'url'];
}
