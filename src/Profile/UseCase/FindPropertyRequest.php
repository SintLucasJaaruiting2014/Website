<?php namespace SintLucas\Profile\UseCase;

class FindPropertyRequest {

	public function __construct($profileId, $id)
	{
		$this->profileId = $profileId;
		$this->id        = $id;
	}

}
