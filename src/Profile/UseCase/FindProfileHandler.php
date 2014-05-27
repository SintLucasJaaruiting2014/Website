<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Profile\SocialMediaAccountRepository;
use SintLucas\School\ProgramRepository;
use SintLucas\User\UserRepository;

class FindProfileHandler implements HandlerInterface {

	protected $profileRepository;
	protected $programRepository;
	protected $socialMediaAccountRepository;
	protected $userRepository;

	public function __construct(ProfileRepository $profileRepository, SocialMediaAccountRepository $socialMediaAccountRepository, UserRepository $userRepository, ProgramRepository $programRepository)
	{
		$this->profileRepository            = $profileRepository;
		$this->programRepository            = $programRepository;
		$this->socialMediaAccountRepository = $socialMediaAccountRepository;
		$this->userRepository               = $userRepository;
	}

	public function handle($command)
	{
		$profile             = $this->profileRepository->find($command->id);
		$user                = $this->userRepository->find($profile->user_id);
		$program             = $this->programRepository->find($profile->program_id);
		$socialMediaAccounts = $this->socialMediaAccountRepository->getForProfile($profile);

		return new FindProfileResponse($profile, $user, $program, $socialMediaAccounts);
	}

}
