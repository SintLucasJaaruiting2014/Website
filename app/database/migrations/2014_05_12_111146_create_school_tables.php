<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_locations', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('school_programs', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('location_id')->unsigned();
			$table->string('type', 20);
			$table->string('name');
			$table->timestamps();

			$table->foreign('location_id')
				->references('id')
				->on('school_locations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('school_programs');
		Schema::drop('school_locations');
	}

}
