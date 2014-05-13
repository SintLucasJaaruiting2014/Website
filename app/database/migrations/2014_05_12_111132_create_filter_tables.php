<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filter_filters', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->tinyInteger('multiple_choice');
			$table->string('label');
		});

		Schema::create('filter_options', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('filter_id')->unsigned();
			$table->string('label');

			$table->foreign('filter_id')->references('id')->on('filter_filters');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filter_options');
		Schema::drop('filter_filters');
	}

}
