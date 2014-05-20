<?php namespace SintLucas\Profile\UseCases;

class ViewProfileListRequest {

	public $seed;

	public function __construct($seed)
	{
		$this->seed = $seed;
	}

}
