<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\DataCollector\DataCollectorController;

class DataCollectorServiceProvider extends ServiceProvider {

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
		$this->app['datacollector.controller'] = $this->app->share(function($app)
		{
			return new DataCollectorController();
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
			'datacollector.controller'
		);
	}

}
