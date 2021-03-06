<?php namespace GamingCalendar\models;

/**
 * Class Channel
 * @package GamingCalendar\models
 */
class Channel extends \Eloquent
{

    public $table = 'channel';

    // Add your validation rules here
    public $rules = [
        'name' => 'required',
        'channel' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'url', 'default_language'];

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
