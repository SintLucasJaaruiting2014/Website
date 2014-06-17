<?php namespace SintLucas\Question\UseCase;

class AnswerListingRequest {

	public $profileId;

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
