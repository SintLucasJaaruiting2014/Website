<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Importer\Importer;
use SintLucas\Importer\ImporterCommand;

class ImporterServiceProvider extends ServiceProvider {

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
		$this->app['importer.importer'] = $this->app->share(function($app)
		{
			$config = $app['config']->get('import', array());
			return new Importer($app, $app['core.manager.parser'], $config);
		});

		$this->app['importer.command'] = $this->app->share(function($app)
		{
			return new ImporterCommand($app['importer.importer']);
		});

		$this->commands('importer.command');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'importer.importer',
			'importer.command'
		);
	}

}
