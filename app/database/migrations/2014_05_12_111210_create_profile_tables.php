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
			$table->integer('student_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->smallInteger('year')->unsigned();
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->string('location')->nullable();
			$table->string('quote', 300)->nullable();
			$table->string('status')->default(0);
			$table->timestamps();

			$table->foreign('program_id')
				->references('id')
				->on('school_programs');

			$table->foreign('user_id')
				->references('id')
				->on('user_users');
		});

		Schema::create('profile_socialmedia', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->string('type', 50);
			$table->string('username');
			$table->timestamps();

			$table->foreign('profile_id')
				->references('id')
				->on('profile_profiles');
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
			$table->integer('question_id')->unsigned();
			$table->string('value', 450);
			$table->timestamps();

			$table->foreign('profile_id')
				->references('id')
				->on('profile_profiles');

			$table->foreign('question_id')
				->references('id')
				->on('profile_questions');
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
		Schema::drop('profile_questions');
		Schema::drop('profile_socialmedia');
		Schema::drop('profile_profiles');
	}

}
