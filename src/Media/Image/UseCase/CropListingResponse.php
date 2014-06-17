<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\Media\Image\Image;

class CropListingResponse {

	public $image;
	public $crops;

	public function __construct(Image $image, $crops)
	{
		$this->image = $image;
		$this->crops = $crops;
	}

}
