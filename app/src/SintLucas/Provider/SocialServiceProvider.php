<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider {

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
		$this->app['social.repos.profile'] = $this->app->share(function($app)
		{
			return new ProfileRepo();
		});

		$this->app['social.repos.socialmedia'] = $this->app->share(function($app)
		{
			return new SocialMediaRepo();
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
			'social.repos.profile',
			'social.repos.socialmedia'
		);
	}

}
