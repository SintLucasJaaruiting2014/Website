<?php namespace SintLucas\Question\UseCases;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Question\AnswerRepository;
use SintLucas\Question\QuestionRepository;

class AnswerQuestionHandler implements HandlerInterface {

	public function __construct(AnswerRepository $answerRepository, ProfileRepository $profileRepository, QuestionRepository $questionRepository)
	{
		$this->answerRepository   = $answerRepository;
		$this->profileRepository  = $profileRepository;
		$this->questionRepository = $questionRepository;
	}

	public function handle($command)
	{
		return new Response();
	}

}
