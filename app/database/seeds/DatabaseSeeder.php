<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SchoolSeeder');
		$this->call('UserSeeder');
		$this->call('ProfileSeeder');
		$this->call('MediaSeeder');
		$this->call('PortfolioSeeder');
	}

}
