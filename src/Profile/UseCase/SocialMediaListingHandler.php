<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Profile\SocialMediaAccountRepository;

class SocialMediaListingHandler implements HandlerInterface {

	protected $profileRepository;
	protected $socialMediaAccountRepository;

	public function __construct(ProfileRepository $profileRepository, SocialMediaAccountRepository $socialMediaAccountRepository)
	{
		$this->profileRepository            = $profileRepository;
		$this->socialMediaAccountRepository = $socialMediaAccountRepository;
	}

	public function handle($command)
	{
		$profile  = $this->profileRepository->find($command->profileId);
		$accounts = $this->socialMediaAccountRepository->getBy($profile);

		return new SocialMediaListingResponse($profile, $accounts);
	}

}
