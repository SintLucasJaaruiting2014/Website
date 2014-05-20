<?php namespace SintLucas\Profile\UseCases;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;

class ViewProfileHandler implements HandlerInterface {

	public function __construct(ProfileRepository $profileRepository)
	{
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profile = $this->profileRepository->find($command->id);

		return new ViewProfileResponse($profile);
	}

}
