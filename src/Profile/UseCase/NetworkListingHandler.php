<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;

class NetworkListingHandler implements HandlerInterface {

	public function __construct(ProfileRepository $profileRepository)
	{
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profiles = $this->profileRepository->getRandom(4);

		return new NetworkListingResponse($profiles);
	}

}
