<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;

class PropertyListingResponse {

	public function __construct(Profile $profile, $properties)
	{
		$this->profile    = $profile;
		$this->properties = $properties;
	}

}
