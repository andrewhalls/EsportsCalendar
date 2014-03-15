<?php namespace GamingCalendar\models;

use GamingCalendar\Repos\Genre\DbGenreRepositoryInterface;

class Genre extends \Eloquent implements DbGenreRepositoryInterface
{

    public $table = 'genre';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];
}
