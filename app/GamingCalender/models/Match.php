<?php namespace GamingCalendar\models;

/**
 * Class Game
 * @package GamingCalendar\models
 */
class Match extends \Eloquent
{
    public $table = 'match';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];

    public function homeTeam()
    {
        return $this->belongsTo('GamingCalendar\models\Team', 'team_a');
    }

    public function awayTeam()
    {
        return $this->belongsTo('GamingCalendar\models\Team', 'team_b');
    }
}
