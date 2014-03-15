<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 08/03/14
 * Time: 18:25
 */

class HTMLBlock extends Eloquent{

    public $table = 'block_html';

    public function show()
    {
        return $this->content;
    }

    public function blocks()
    {
        return $this->morphMany('EloquentBlock', 'blockable');
    }

}