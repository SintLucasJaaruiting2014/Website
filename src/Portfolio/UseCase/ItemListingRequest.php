<?php namespace SintLucas\Portfolio\UseCase;

class ItemListingRequest {

	public $profileId;

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
