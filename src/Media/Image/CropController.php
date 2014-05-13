<?php namespace SintLucas\Media\Crop;

use SintLucas\Profile\ProfileRepository;
use SintLucas\Rest\NestedController;

class CropController extends NestedController {

	public function __construct(ImageRepository $related, CropRepository $repository)
	{
		$this->related    = $related;
		$this->repository = $repository;
	}

}
