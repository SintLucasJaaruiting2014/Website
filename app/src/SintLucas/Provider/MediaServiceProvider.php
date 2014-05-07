<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Domain\Media\MediaService;
use SintLucas\Domain\Media\Models\Item;
use SintLucas\Domain\Media\Models\Type;
use SintLucas\Domain\Media\Repos\ItemRepo;
use SintLucas\Domain\Media\Repos\TypeRepo;

class MediaServiceProvider extends ServiceProvider {

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
		$this->app['media.repo.item'] = $this->app->share(function($app)
		{
			return new ItemRepo(new Item);
		});

		$this->app['media.service'] = $this->app->share(function($app)
		{
			return new MediaService($app['media.repo.item']);
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
			'media.repo.item',
			'media.service'
		);
	}

}
