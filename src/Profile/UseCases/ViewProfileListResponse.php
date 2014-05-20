<?php namespace SintLucas\Profile\UseCases;

use SintLucas\Profile\Profile;

class ViewProfileListResponse {

	public $profiles;

	public function __construct($profiles)
	{
		$this->profiles = $profiles;
	}

}
