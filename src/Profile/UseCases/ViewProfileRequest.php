<?php namespace SintLucas\Profile\UseCases;

class ViewProfileRequest {

	public $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

}
