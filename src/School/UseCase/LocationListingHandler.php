<?php namespace SintLucas\School\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\School\LocationRepository;

class LocationListingHandler implements HandlerInterface {

	protected $locationRepository;

	public function __construct(LocationRepository $locationRepository)
	{
		$this->locationRepository  = $locationRepository;
	}

	public function handle($command)
	{
		$locations = $this->locationRepository->all();

		return new LocationListingResponse($locations);
	}

}
