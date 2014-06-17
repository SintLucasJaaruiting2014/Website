<?php namespace SintLucas\Filter\UseCase;

class OptionListingRequest {

	public $filterId;

	public function __construct($filterId)
	{
		$this->filterId = $filterId;
	}

}
