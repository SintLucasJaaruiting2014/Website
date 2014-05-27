<?php namespace SintLucas\Profile\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Profile\PropertyRepository;

class PropertyListingHandler implements HandlerInterface {

	protected $profileRepository;
	protected $propertyRepository;

	public function __construct(ProfileRepository $profileRepository, PropertyRepository $propertyRepository)
	{
		$this->profileRepository  = $profileRepository;
		$this->propertyRepository = $propertyRepository;
	}

	public function handle($command)
	{
		$profile = $this->profileRepository->find($command->profileId);
		$properties = $this->propertyRepository->findBy($profile);

		return new PropertyListingResponse($profile, $properties);
	}

}
