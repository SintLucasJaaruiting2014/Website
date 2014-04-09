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
		Schema::create('portfolio_items', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('profile_id')->unsigned();
			$table->string('name');
			$table->string('beschrijving');
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
		Schema::drop('portfolio_items');
	}

}
