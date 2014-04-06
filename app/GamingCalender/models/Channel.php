<?php namespace GamingCalendar\models;

/**
 * Class Channel
 * @package GamingCalendar\models
 */
class Channel extends \Eloquent
{

    public $table = 'channel';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];

    public function getLanguagesAttribute()
    {
        return [
                'English',
                'French',
                'German',
                'Russian'
        ];
    }
}
