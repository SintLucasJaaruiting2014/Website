<?php namespace SintLucas\Profile\UseCases;

use SintLucas\Profile\Profile;

class ViewProfileResponse {

	public $profile;

	public function __construct(Profile $profile)
	{
		$this->profile = $profile;
	}

}
