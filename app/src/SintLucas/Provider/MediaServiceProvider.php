<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Media\MediaService;
use SintLucas\Media\Repos\ImageRepo;
use SintLucas\Media\Repos\MediaRepo;
use SintLucas\Media\Repos\VideoRepo;

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
		$this->app['media.repos.image'] = $this->app->share(function($app)
		{
			return new ImageRepo();
		});

		$this->app['media.repos.video'] = $this->app->share(function($app)
		{
			return new VideoRepo();
		});

		$this->app['media.repos.media'] = $this->app->share(function($app)
		{
			return new MediaRepo();
		});

		$this->app['media.service'] = $this->app->share(function($app)
		{
			return new MediaService($app['media.repos.media'], $app['media.repos.image'], $app['media.repos.video']);
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
			'media.repos.image',
			'media.repos.video',
			'media.repos.media'
		);
	}

}
