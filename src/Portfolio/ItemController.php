<?php namespace SintLucas\Portfolio;

use SintLucas\Profile\ProfileRepository;
use SintLucas\Rest\NestedController;

class ItemController extends NestedController {

	public function __construct(ProfileRepository $related, ItemRepository $repository)
	{
		$this->related    = $related;
		$this->repository = $repository;
	}

}
