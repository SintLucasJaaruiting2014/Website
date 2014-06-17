<?php namespace SintLucas\Image;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider {

	public function boot()
	{
		//
	}

	public function register()
	{
		$this->app['SintLucas\Image\ImagineManager'] = $this->app->share(function($app)
		{
			return new ImagineManager($app);
		});
	}

}
