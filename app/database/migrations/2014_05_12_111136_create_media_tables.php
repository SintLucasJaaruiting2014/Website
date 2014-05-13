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
		Schema::create('media_images', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('filename');
			$table->timestamps();
		});

		Schema::create('media_imagecrops', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('image_id')->unsigned();
			$table->string('key');
			$table->smallInteger('x')->unsigned();
			$table->smallInteger('y')->unsigned();
			$table->smallInteger('width')->unsigned();
			$table->smallInteger('height')->unsigned();
			$table->timestamps();

			$table->foreign('image_id')
				->references('id')
				->on('media_images');
		});

		Schema::create('media_videos', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('type', 50);
			$table->string('url');
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
		Schema::drop('media_videos');
		Schema::drop('media_imagecrops');
		Schema::drop('media_images');
	}

}
