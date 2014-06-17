<?php namespace SintLucas\Profile\UseCase;

class ProfileListingRequest {

	public $seed;
	public $page;
	public $perPage;

	public function __construct($seed, $page, $perPage)
	{
		$this->seed    = $seed;
		$this->page    = $page;
		$this->perPage = $perPage;
	}

}
