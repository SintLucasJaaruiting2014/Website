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
		$this->app['school.repo.location'] = $this->app->share(function($app)
		{
			return new LocationRepo(new Location);
		});

		$this->app['school.repo.program'] = $this->app->share(function($app)
		{
			return new ProgramRepo(new Program);
		});

		$this->app['school.repo.type'] = $this->app->share(function($app)
		{
			return new TypeRepo(new Type);
		});

		$this->app['school.repo.year'] = $this->app->share(function($app)
		{
			return new YearRepo(new Year);
		});

		$this->app['school.service'] = $this->app->share(function($app)
		{
			return new SchoolService(
				$app['school.repo.location'],
				$app['school.repo.program'],
				$app['school.repo.type'],
				$app['school.repo.year']
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
			'school.repo.location',
			'school.repo.program',
			'school.repo.type',
			'school.repo.year',
			'school.service'
		);
	}

}
