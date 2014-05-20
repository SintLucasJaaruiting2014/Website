<?php namespace SintLucas\Profile\UseCases;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;

class ViewProfileListHandler implements HandlerInterface {

	public function __construct(ProfileRepository $profileRepository)
	{
		$this->profileRepository = $profileRepository;
	}

	public function handle($command)
	{
		$profiles = $this->profileRepository->all();

		return new ViewProfileListResponse($profiles);
	}

}
