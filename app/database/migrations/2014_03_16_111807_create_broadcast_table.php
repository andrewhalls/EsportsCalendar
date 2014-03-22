<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBroadcastTable extends Migration
{
    public function up()
    {
        Schema::create('broadcast', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->string('game_id');
            $table->string('channel_id');
        });
    }

    public function down()
    {
        Schema::drop('broadcast');
    }
}
