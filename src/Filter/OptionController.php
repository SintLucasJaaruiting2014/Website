<?php namespace SintLucas\Filter;

use SintLucas\Rest\NestedController;

class OptionController extends NestedController {

	public function __construct(FilterRepository $related, OptionRepository $repository)
	{
		$this->related    = $related;
		$this->repository = $repository;
	}

}
