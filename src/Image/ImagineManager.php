<?php namespace SintLucas\Image;

use Illuminate\Support\Manager;
use Imagine;

class ImagineManager extends Manager {

	public function createGdDriver()
	{
		return new Imagine\Gd\Imagine();
	}

	public function createImagickDriver()
	{
		return new Imagine\Imagick\Imagine();
	}

	public function getDefaultDriver()
	{
		return 'gd';
	}

}
