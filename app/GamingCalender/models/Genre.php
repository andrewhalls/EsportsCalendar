<?php namespace GamingCalendar\models;

/**
 * Class Genre
 * @package GamingCalendar\models
 */
class Genre extends \Eloquent
{

    public $table = 'genre';

    // Add your validation rules here
    public $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];
}
