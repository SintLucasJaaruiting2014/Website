<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

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
		$this->app['user.repos.role'] = $this->app->share(function($app)
		{
			return new RoleRepo();
		});

		$this->app['user.repos.user'] = $this->app->share(function($app)
		{
			return new UserRepo();
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
			'user.repos.role',
			'user.repos.user'
		);
	}

}
