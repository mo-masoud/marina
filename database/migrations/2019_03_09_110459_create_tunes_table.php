<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTunesTable extends Migration {

	public function up()
	{
		Schema::create('tunes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 191);
		});
	}

	public function down()
	{
		Schema::drop('tunes');
	}
}