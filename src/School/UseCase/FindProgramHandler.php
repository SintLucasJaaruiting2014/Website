<?php namespace SintLucas\School\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\School\ProgramRepository;

class FindProgramHandler implements HandlerInterface {

	protected $programRepository;

	public function __construct(ProgramRepository $programRepository)
	{
		$this->programRepository  = $programRepository;
	}

	public function handle($command)
	{
		$program = $this->programRepository->findWithLocation($command->id);

		return new FindProgramResponse($program);
	}

}
