<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_types', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->timestamps();
		});

		Schema::create('portfolio_items', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->timestamps();

			$table->foreign('profile_id')->references('id')->on('profile_profiles');
			$table->foreign('type_id')->references('id')->on('portfolio_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfolio_items');
		Schema::drop('portfolio_types');
	}

}
