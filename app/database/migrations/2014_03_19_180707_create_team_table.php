<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamTable extends Migration
{
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->string('url');
        });
    }

    public function down()
    {
        Schema::drop('team');
    }
}
