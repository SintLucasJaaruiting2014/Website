<?php namespace SintLucas\Profile\UseCase;

class FindProfileRequest {

	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

}
