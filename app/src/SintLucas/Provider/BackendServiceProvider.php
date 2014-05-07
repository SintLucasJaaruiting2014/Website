<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Backend;
use SintLucas\Core\ParserManager;

class BackendServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['backend.portfolio.item'] = $this->app->share(function($app)
		{
			return new Backend\Portfolio\ItemController($app['portfolio.repo.item']);
		});

		$this->app['backend.portfolio.type'] = $this->app->share(function($app)
		{
			return new Backend\Portfolio\TypeController($app['portfolio.repo.type']);
		});

		$this->app['backend.profile'] = $this->app->share(function($app)
		{
			return new Backend\ProfileController($app['profile.repo.profile']);
		});

		$this->app['backend.profile.answer'] = $this->app->share(function($app)
		{
			return new Backend\Profile\AnswerController($app['profile.repo.answer']);
		});

		$this->app['backend.profile.filter'] = $this->app->share(function($app)
		{
			return new Backend\Profile\FilterController($app['profile.repo.filter']);
		});

		$this->app['backend.profile.property'] = $this->app->share(function($app)
		{
			return new Backend\Profile\PropertyController($app['profile.repo.property']);
		});

		$this->app['backend.profile.question'] = $this->app->share(function($app)
		{
			return new Backend\Profile\QuestionController($app['profile.repo.question']);
		});

		$this->app['backend.school.location'] = $this->app->share(function($app)
		{
			return new Backend\School\LocationController($app['school.repo.location']);
		});

		$this->app['backend.school.program'] = $this->app->share(function($app)
		{
			return new Backend\School\ProgramController($app['school.repo.program']);
		});

		$this->app['backend.school.type'] = $this->app->share(function($app)
		{
			return new Backend\School\TypeController($app['school.repo.type']);
		});

		$this->app['backend.school.year'] = $this->app->share(function($app)
		{
			return new Backend\School\YearController($app['school.repo.year']);
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
