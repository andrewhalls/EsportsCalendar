<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Channel\DbChannelRepository;

class Channel extends \Eloquent
{

    public $table = 'channel';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
