<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\User\Models\Role;
use SintLucas\User\Models\User;
use SintLucas\User\Repos\RoleRepo;
use SintLucas\User\Repos\UserRepo;

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
		$this->app['user.repo.role'] = $this->app->share(function($app)
		{
			return new RoleRepo(new Role);
		});

		$this->app['user.repo.user'] = $this->app->share(function($app)
		{
			return new UserRepo(new User);
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
			'user.repo.role',
			'user.repo.user'
		);
	}

}
