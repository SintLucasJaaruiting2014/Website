<?php namespace SintLucas\Question\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Question\AnswerRepository;
use SintLucas\Profile\ProfileRepository;

class AnswerListingHandler implements HandlerInterface {

	protected $answerRepository;
	protected $profileRepository;

	public function __construct(AnswerRepository $answerRepository, ProfileRepository $profileRepository)
	{
		$this->answerRepository  = $answerRepository;
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profile = $this->profileRepository->find($command->profileId);
		$answers = $this->answerRepository->getBy($profile);

		return new AnswerListingResponse($profile, $answers);
	}

}
