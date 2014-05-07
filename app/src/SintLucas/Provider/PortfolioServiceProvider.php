<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Domain\Portfolio\Models\Item;
use SintLucas\Domain\Portfolio\Models\Type;
use SintLucas\Domain\Portfolio\PortfolioService;
use SintLucas\Domain\Portfolio\Repos\ItemRepo;
use SintLucas\Domain\Portfolio\Repos\TypeRepo;

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
			return new ItemRepo(new Item);
		});

		$this->app['portfolio.repo.type'] = $this->app->share(function($app)
		{
			return new TypeRepo(new Type);
		});

		$this->app['portfolio.service'] = $this->app->share(function($app)
		{
			return new PortfolioService($app['portfolio.repo.item'], $app['portfolio.repo.type'], $app['media.service']);
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
			'portfolio.repo.type',
			'portfolio.service'
		);
	}

}
