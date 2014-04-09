<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Portfolio\Repos\ItemRepo;
use SintLucas\Portfolio\Models\Item;

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
		$this->app['portfolio.repo.item'] = $this->app->share(function($app)
		{
			return new ItemRepo();
		});

		$this->app['portfolio.service'] = $this->app->share(function($app)
		{
			return new PortfolioService($app['portfolio.repo.item']);
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
			'portfolio.repo.item',
			'portfolio.service'
		);
	}

}
