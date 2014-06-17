<?php  namespace SintLucas\School\UseCase;

class ProgramListingResponse {

	public $programs;

	public function __construct($programs)
	{
		$this->programs = $programs;
	}

}
