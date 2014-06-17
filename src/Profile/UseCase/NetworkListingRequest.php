<?php namespace SintLucas\Profile\UseCase;

class NetworkListingRequest {

	public $profileId;

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
