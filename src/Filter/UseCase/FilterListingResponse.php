<?php namespace SintLucas\Filter\UseCase;

class FilterListingResponse {

	public $filters;

	public function __construct($filters)
	{
		$this->filters = $filters;
	}

}
