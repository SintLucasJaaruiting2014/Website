<?php namespace SintLucas\Image;

use Imagine\Image\ImageInterface;
use Imagine\Image\Box;
use Imagine\Image\Point;

class Processor {

	public function __construct(ImagineManager $imagine)
	{
		$this->imagine = $imagine;
	}

	public function resize(Image $image, Config $config, Crop $crop = null)
	{
		$image = $this->imagine->open($image->path);

		if($config->crop and $crop !== null)
		{
			$image->crop(
				new Point($crop->x, $crop->y),
				new Box($crop->width, $crop->height)
			);
		}

		$image->thumbnail(new Box($config->width, $config->height), ImageInterface::THUMBNAIL_OUTBOUND)
			->save(public_path('images/test.jpg'));
	}

}
