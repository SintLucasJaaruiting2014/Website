<?php namespace SintLucas\Question\UseCase\AnswerQuestion;

use SintLucas\Question\Answer;

class AnswerQuestionResponse {

	public $answer;

	public function __construct(Answer $answer)
	{
		$this->answer = $answer;
	}

}
