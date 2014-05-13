<?php namespace SintLucas\Filter;

use SintLucas\Rest\Controller;

class FilterController extends Controller {

	public function __construct(FilterRepository $repository)
	{
		$this->repository = $repository;
	}

}
