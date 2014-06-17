<?php  namespace SintLucas\School\UseCase;

class FindProgramRequest {

	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

}
