<?php namespace SintLucas\Media;

use SintLucas\Rest\Controller;

class ImageController extends Controller {

	public function __construct(ImageRepository $repository)
	{
		$this->repository = $repository;
	}

}
