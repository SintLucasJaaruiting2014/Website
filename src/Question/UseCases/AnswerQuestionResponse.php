<?php namespace SintLucas\Question\UseCases\AnswerQuestion;

use SintLucas\Question\Answer;

class AnswerQuestionResponse {

	public $answer;

	public function __construct(Answer $answer)
	{
		$this->answer = $answer;
	}

}
