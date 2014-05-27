<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;

class ProfileListingResponse {

	public $profiles;

	public function __construct($profiles)
	{
		$this->profiles = $profiles;
	}

}
