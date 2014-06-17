<?php namespace SintLucas\Question\UseCase;

use SintLucas\Profile\Profile;

class AnswerListingResponse {

	public $answers;
	public $profile;

	public function __construct(Profile $profile, $answers)
	{
		$this->answers = $answers;
		$this->profile = $profile;
	}

}
