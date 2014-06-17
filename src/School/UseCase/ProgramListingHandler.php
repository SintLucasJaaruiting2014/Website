<?php namespace SintLucas\School\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\School\ProgramRepository;

class ProgramListingHandler implements HandlerInterface {

	protected $programRepository;

	public function __construct(ProgramRepository $programRepository)
	{
		$this->programRepository  = $programRepository;
	}

	public function handle($command)
	{
		$programs = $this->programRepository->getWithLocation();

		return new ProgramListingResponse($programs);
	}

}
