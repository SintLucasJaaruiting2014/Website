<?php namespace SintLucas\Question\UseCase;

use SintLucas\Question\Answer;
use SintLucas\Profile\Profile;

class FindAnswerResponse {

	public $answer;
	public $profile;

	public function __construct(Profile $profile, Answer $answer)
	{
		$this->answer  = $answer;
		$this->profile = $profile;
	}

}
