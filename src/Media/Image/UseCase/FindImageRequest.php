<?php namespace SintLucas\Media\Image\UseCase;

class FindImageRequest {

	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

}
