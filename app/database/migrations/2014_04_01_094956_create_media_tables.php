<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_types', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->timestamps();
		});

		Schema::create('media_items', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('linkable_id')->unsigned();
			$table->string('linkable_type');
			$table->integer('type_id')->unsigned();
			$table->string('value');
			$table->timestamps();

			$table->foreign('type_id')->references('id')->on('media_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media_items');
		Schema::drop('media_types');
	}

}
