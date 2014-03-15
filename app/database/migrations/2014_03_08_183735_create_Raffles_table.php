<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRafflesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('Raffles', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->double('price');
			$table->datetime('started_at');
			$table->datetime('ended_at');
			$table->integer('max_tickets');
			$table->integer('current_tickets');
			$table->timestamps();
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('Raffles');
	}

}
