<?php namespace GamingCalendar\models;

use Carbon\Carbon;

/**
 * Class Broadcast
 * @package GamingCalendar\models
 */
class Broadcast extends \Eloquent
{
    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $guarded = [];
    protected $table = 'broadcast';
    public $timestamps = true;
    protected $softDelete = true;

    public function match()
    {
        return $this->hasMany('GamingCalendar\models\Match');
    }

    public function channel()
    {
        return $this->hasOne('GamingCalendar\models\Channel');
    }

    public function game()
    {
        return $this->belongsTo('GamingCalendar\models\Game');
    }

    public function isActive()
    {
        return ($this->start_at < Carbon::now() and $this->end_at > Carbon::now());
    }

    /**
     * @param $query
     * @param $days
     */
    public function scopeBroadcasting($query, $days = 3)
    {
        return $query->where('start_at', '<', Carbon::now())
            ->where('end_at', '<', Carbon::now());
    }

    /**
     * @param $query
     * @param $days
     */
    public function scopeOverview($query, $days = 3)
    {
        return $query->where('start_at', '>', Carbon::now()->subDays($days))
            ->where('end_at', '<', Carbon::now()->addDays($days));
    }

    /**
     * @param $query
     * @param $days
     */
    public function scopeUpcoming($query, $days = 3)
    {
        return $query->where('start_at', '<', Carbon::now()->addDays($days))
            ->where('start_at', '>', Carbon::now());
    }

    /**
     * @param $query
     * @param $days
     */
    public function scopeCompleted($query, $days = 3)
    {
        return $query->where('end_at', '<', Carbon::now()->addDays($days))
            ->where('end_at', '>', Carbon::now());
    }
}
