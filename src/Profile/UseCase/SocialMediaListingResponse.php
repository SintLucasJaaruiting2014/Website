<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;

class SocialMediaListingResponse {

	public function __construct(Profile $profile, $accounts)
	{
		$this->profile  = $profile;
		$this->accounts = $accounts;
	}

}
