<?php namespace SintLucas\School\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\School\LocationRepository;

class FindLocationHandler implements HandlerInterface {

	protected $locationRepository;

	public function __construct(LocationRepository $locationRepository)
	{
		$this->locationRepository  = $locationRepository;
	}

	public function handle($command)
	{
		$location = $this->locationRepository->find($command->id);

		return new FindLocationResponse($location);
	}

}
