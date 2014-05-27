<?php namespace SintLucas\Portfolio\UseCase;

class FindItemRequest {

	public $profileId;
	public $id;

	public function __construct($profileId, $id)
	{
		$this->profileId = $profileId;
		$this->id        = $id;
	}

}
