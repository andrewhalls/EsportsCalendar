<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Team\DbTeamRepositoryInterface;

class Team extends \Eloquent implements DbTeamRepositoryInterface
{

    public $table = 'team';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
