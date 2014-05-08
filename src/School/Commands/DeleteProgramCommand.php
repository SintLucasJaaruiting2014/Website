<?php namespace SintLucas\School\Commands;

use SintLucas\School\Program;

class DeleteProgramCommand {

	protected $program;

	public function __construct(Program $program)
	{
		$this->Program = $program;
	}

}
