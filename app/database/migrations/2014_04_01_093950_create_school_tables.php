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

		Schema::create('school_types', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('school_years', function($table)
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
			$table->integer('type_id')->unsigned();
			$table->string('name');

			$table->foreign('type_id')->references('id')->on('school_types');
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
		Schema::drop('school_programs');
		Schema::drop('school_years');
		Schema::drop('school_types');
		Schema::drop('school_locations');
	}

}
