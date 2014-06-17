<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;

class ProfileListingHandler implements HandlerInterface {

	public function __construct(ProfileRepository $profileRepository)
	{
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profiles = $this->profileRepository->paginateRandom(
			$command->seed,
			$command->page,
			$command->perPage
		);

		return new ProfileListingResponse($profiles);
	}

}
