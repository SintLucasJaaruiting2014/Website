<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\Media\Image\Crop;
use SintLucas\Media\Image\Image;

class FindCropResponse {

	public $image;
	public $crop;

	public function __construct(Image $image, Crop $crop = null)
	{
		$this->image = $image;
		$this->crop  = $crop;
	}

}
