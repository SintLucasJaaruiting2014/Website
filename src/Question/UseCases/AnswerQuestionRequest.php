<?php namespace SintLucas\Question\UseCases;

use SintLucas\Question\Answer;

class AnswerQuestionRequest {

	public $answer;

	public function __construct(Answer $answer)
	{
		$this->answer = $answer;
	}

}
