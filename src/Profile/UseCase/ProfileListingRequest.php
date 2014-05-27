<?php namespace SintLucas\Profile\UseCase;

class ProfileListingRequest {

	public $seed;

	public function __construct($seed)
	{
		$this->seed = $seed;
	}

}
