<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;

class NetworkListingResponse {

	public $profiles;

	public function __construct($profiles)
	{
		$this->profiles = $profiles;
	}

}
