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
			$table->string('email')->unique();
			$table->string('password')->nullable();
			$table->string('remember_token')->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->timestamps();
		});

		Schema::create('user_role_user', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->integer('user_id')->unsigned();

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
		Schema::drop('user_users');
	}

}
