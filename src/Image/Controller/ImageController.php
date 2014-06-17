<?php namespace SintLucas\Image\Controller;

use Illuminate\Config\Repository;
use Illuminate\Routing\Controller;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Image\Config;
use SintLucas\Image\Crop;
use SintLucas\Image\Image;
use SintLucas\Image\Processor;
use SintLucas\Media\Image\UseCase\FindCropRequest;

class ImageController extends Controller {

	public function __construct(CommandBus $bus, Processor $processor, Repository $config)
	{
		$this->bus       = $bus;
		$this->processor = $processor;
		$this->config    = $config;
	}

	public function show($config, $id)
	{
		$request = new FindCropRequest($id, $config);

		$response = $this->bus->execute($request);
		$image = new Image($response->image->filename);

		if($response->crop)
		{
			$crop = new Crop(
				$response->x,
				$response->y,
				$response->width,
				$response->height
			);
		}

		if($cropConfig = $this->getCropConfig($config))
		{
			$config = new Config(
				$config,
				$cropConfig['width'],
				$cropConfig['height'],
				$cropConfig['crop']
			);

			$this->processor->resize(
				$image,
				$config,
				isset($crop) ? $crop : null
			);
		}
	}

	public function getCropConfig($key)
	{
		return $this->config->get('image.crops.'.$key);
	}

}
