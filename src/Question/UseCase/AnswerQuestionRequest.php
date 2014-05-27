<?php namespace SintLucas\Question\UseCase;

use SintLucas\Question\Answer;

class AnswerQuestionRequest {

	public $answer;

	public function __construct(Answer $answer)
	{
		$this->answer = $answer;
	}

}
