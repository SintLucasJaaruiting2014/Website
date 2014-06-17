<?php  namespace SintLucas\School\UseCase;

use SintLucas\School\Program;

class FindProgramResponse {

	public $program;

	public function __construct(Program $program)
	{
		$this->program = $program;
	}

}
