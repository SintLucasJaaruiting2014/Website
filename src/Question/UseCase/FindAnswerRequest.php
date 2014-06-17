<?php namespace SintLucas\Question\UseCase;

class FindAnswerRequest {

	public $id;
	public $profileId;

	public function __construct($profileId, $id)
	{
		$this->id        = $id;
		$this->profileId = $profileId;
	}

}
