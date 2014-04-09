<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Core\ParserManager;

class ParserServiceProvider extends ServiceProvider {

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
		$this->app['core.manager.parser'] = $this->app->share(function($app)
		{
			return new ParserManager($app);
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
			'core.manager.parser'
		);
	}

}
