<?php namespace SintLucas\Media\Image\UseCase;

class FindCropRequest {

	public $imageId;
	public $config;

	public function __construct($imageId, $config)
	{
		$this->imageId = $imageId;
		$this->config  = $config;
	}

}
