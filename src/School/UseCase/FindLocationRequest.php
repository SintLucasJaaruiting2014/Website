<?php  namespace SintLucas\School\UseCase;

class FindLocationRequest {

	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

}
