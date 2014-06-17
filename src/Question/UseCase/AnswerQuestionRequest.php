<?php namespace SintLucas\Question\UseCase;

use SintLucas\Question\Answer;

class AnswerQuestionRequest {

	public $profileId;

	public function __construct($profileId)
	{
		$this->profileId = $profileId;
	}

}
