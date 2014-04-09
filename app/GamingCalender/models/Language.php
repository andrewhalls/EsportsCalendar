<?php namespace GamingCalendar\models;

/**
 * Class Language
 * @package GamingCalendar\models
 */
class Language extends \Eloquent
{

    public $table = 'language';

    // Add your validation rules here
    public $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];
}
