<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_profiles', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('program_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('quote', 300);
			$table->timestamps();

			$table->foreign('program_id')->references('id')->on('school_programs');
			$table->foreign('user_id')->references('id')->on('user_users');
		});

		Schema::create('profile_socialmediatypes', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('profile_socialmedia', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->string('url');
			$table->timestamps();

			$table->foreign('profile_id')->references('id')->on('profile_profiles');
			$table->foreign('type_id')->references('id')->on('profile_socialmediatypes');
		});

		Schema::create('profile_filters', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('label');
			$table->timestamps();
		});

		Schema::create('profile_filteroptions', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('filter_id')->unsigned();
			$table->string('value');
			$table->timestamps();

			$table->foreign('filter_id')->references('id')->on('profile_filters');
		});

		Schema::create('profile_profileproperty', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('filter_id')->unsigned();
			$table->integer('option_id')->unsigned();
			$table->integer('profile_id')->unsigned();
			$table->timestamps();

			$table->foreign('filter_id')->references('id')->on('profile_filters');
			$table->foreign('option_id')->references('id')->on('profile_filteroptions');
			$table->foreign('profile_id')->references('id')->on('profile_profiles');
		});

		Schema::create('profile_questions', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('label');
			$table->timestamps();
		});

		Schema::create('profile_answers', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->string('value');
			$table->timestamps();

			$table->foreign('profile_id')->references('id')->on('profile_profiles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_answers');
		Schema::drop('profile_profileproperty');
		Schema::drop('profile_questions');
		Schema::drop('profile_filteroptions');
		Schema::drop('profile_filters');
		Schema::drop('profile_socialmedia');
		Schema::drop('profile_socialmediatypes');
		Schema::drop('profile_profiles');
	}

}
