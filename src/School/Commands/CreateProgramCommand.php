<?php namespace SintLucas\School\Commands;

class CreateProgramCommand {

	protected $label;
	protected $type;

	public function __construct($label, $type)
	{
		$this->label = $label;
		$this->type = $type;
	}

}
