<?php

class Raffle extends \Eloquent {

    public $table = 'raffles';

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

    public function show()
    {
        return View::make('raffles.block')
            ->with('raffle', $this);
    }

}