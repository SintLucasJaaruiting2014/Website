<?php namespace SintLucas\Media\Image\UseCase;

class ImageListingResponse {

	public $images;

	public function __construct($images)
	{
		$this->images = $images;
	}

}
