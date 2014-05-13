<?php namespace SintLucas\Profile\Media;

use SintLucas\Rest\Controller;

class VideoController extends Controller {

	public function __construct(VideoRepository $repository)
	{
		$this->repository = $repository;
	}

}
