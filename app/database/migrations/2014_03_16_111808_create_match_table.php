<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchTable extends Migration
{
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('broadcast_id')->unsigned();
            $table->integer('team_a');
            $table->integer('team_b');
        });
    }

    public function down()
    {
        Schema::drop('match');
    }
}
