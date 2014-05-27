<?php namespace SintLucas\Profile\UseCase;

class PropertyListingRequest {

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
