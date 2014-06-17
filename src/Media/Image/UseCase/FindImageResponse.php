<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\Media\Image\Image;

class FindImageResponse {

	public $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

}
