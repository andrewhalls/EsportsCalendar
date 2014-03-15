<?php

class EloquentPage extends \Eloquent implements PageRepository {

    public $table = 'pages';

// Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    /**
     * @param null $id
     * @return array
     */
    public function getRules($id = null)
    {
        return $this->rules;
    }

}