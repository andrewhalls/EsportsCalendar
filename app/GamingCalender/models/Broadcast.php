<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Broadcast\DbBroadcastRepositoryInterface;

class Broadcast extends \Eloquent implements DbBroadcastRepositoryInterface
{

    public $table = 'broadcast';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
