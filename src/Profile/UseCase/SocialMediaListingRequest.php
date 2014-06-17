<?php namespace SintLucas\Profile\UseCase;

class SocialMediaListingRequest {

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
