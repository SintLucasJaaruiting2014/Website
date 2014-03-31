<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Portfolio\

class PortfolioServiceProvider extends ServiceProvider {

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
		$this->app['portfolio.repos.item'] = $this->app->share(function($app)
		{
			return new ItemRepo();
		});

		$this->app['portfolio.service'] = $this->app->share(function($app)
		{
			return new PortfolioService($app['portfolio.repos.item']);
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
			'portfolio.repos.item'
		);
	}

}
