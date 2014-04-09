<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_users', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('school_email')->unique();
			$table->string('personal_email')->unique();
			$table->string('password');
			$table->string('reset_hash');
			$table->timestamps();
		});

		Schema::create('user_roles', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('label');
		});

		Schema::create('user_role_user', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->foreign('role_id')->references('id')->on('user_roles');
			$table->foreign('user_id')->references('id')->on('user_users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_role_user');
		Schema::drop('user_roles');
		Schema::drop('user_users');
	}

}
