<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\School\Repos\ClassRepo;

class SchoolServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['school.repos.location'] = $this->app->share(function($app)
		{
			return new LocationRepo();
		});

		$this->app['school.repos.program'] = $this->app->share(function($app)
		{
			return new ProgramRepo();
		});

		$this->app['school.repos.year'] = $this->app->share(function($app)
		{
			return new YearRepo();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'school.repos.location',
			'school.repos.program',
			'school.repos.year'
		);
	}

}
