<?php namespace GamingCalendar\models;

/**
 * Class Broadcast
 * @package GamingCalendar\models
 */
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
