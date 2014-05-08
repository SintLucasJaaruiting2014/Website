<?php namespace SintLucas\School\Commands;

use SintLucas\School\Program;

class UpdateProgramCommand {

	protected $program;
	protected $label;
	protected $type;

	public function __construct(Program $program, $label, $type)
	{
		$this->program = $program;
		$this->label = $label;
		$this->type = $type;
	}

}
