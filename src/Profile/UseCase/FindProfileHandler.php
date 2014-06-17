<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Media\Image\ImageRepository;
use SintLucas\Profile\ProfileRepository;
use SintLucas\School\ProgramRepository;
use SintLucas\User\UserRepository;

class FindProfileHandler implements HandlerInterface {

	protected $profileRepository;
	protected $programRepository;
	protected $userRepository;

	public function __construct(ProfileRepository $profileRepository, ImageRepository $imageRepository, UserRepository $userRepository, ProgramRepository $programRepository)
	{
		$this->profileRepository = $profileRepository;
		$this->imageRepository   = $imageRepository;
		$this->programRepository = $programRepository;
		$this->userRepository    = $userRepository;
	}

	public function handle($command)
	{
		$profile = $this->profileRepository->find($command->id);
		$picture = $this->imageRepository->find($profile->image_id);
		$user    = $this->userRepository->find($profile->user_id);
		$program = $this->programRepository->find($profile->program_id);

		return new FindProfileResponse($profile, $picture, $user, $program);
	}

}
