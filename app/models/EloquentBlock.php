<?php

/**
 * Class EloquentBlock
 */
class EloquentBlock extends \Eloquent implements BlockRepository {

    public $table = 'blocks';

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public function renderable()
    {
        return $this->morphTo();
    }

    /**
     * @param null $id
     * @return array
     */
    public function getRules($id = null)
    {
        return $this->rules;
    }

    public function render()
    {
        return $this->renderable->render;
    }

}