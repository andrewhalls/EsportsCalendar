<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Broadcast\DbBroadcastRepository;

class Broadcast extends \Eloquent
{

    public $table = 'broadcast';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
