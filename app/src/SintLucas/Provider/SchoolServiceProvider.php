<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\School\Models\Location;
use SintLucas\School\Models\Program;
use SintLucas\School\Models\Year;
use SintLucas\School\Models\Type;
use SintLucas\School\Repos\LocationRepo;
use SintLucas\School\Repos\ProgramRepo;
use SintLucas\School\Repos\YearRepo;
use SintLucas\School\Repos\TypeRepo;
use SintLucas\School\SchoolService;

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
			return new LocationRepo(new Location);
		});

		$this->app['school.repos.program'] = $this->app->share(function($app)
		{
			return new ProgramRepo(new Program);
		});

		$this->app['school.repos.type'] = $this->app->share(function($app)
		{
			return new TypeRepo(new Type);
		});

		$this->app['school.repos.year'] = $this->app->share(function($app)
		{
			return new YearRepo(new Year);
		});

		$this->app['school.service'] = $this->app->share(function($app)
		{
			return new SchoolService(
				$app['school.repos.location'],
				$app['school.repos.program'],
				$app['school.repos.type'],
				$app['school.repos.year']
			);
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
			'school.repos.type',
			'school.repos.year',
			'school.service'
		);
	}

}
