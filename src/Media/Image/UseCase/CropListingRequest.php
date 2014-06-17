<?php namespace SintLucas\Media\Image\UseCase;

class CropListingRequest {

	public $imageId;

	public function __construct($imageId)
	{
		$this->imageId = $imageId;
	}

}
