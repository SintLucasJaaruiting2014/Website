<?php namespace SintLucas\Profile\UseCases;

use SintLucas\Profile\Profile;

class AddSocialMediaAccountRequest {

	public $profile;
	public $type;
	public $username;

	public function __construct(Profile $profile, $type, $username)
	{
		$this->profile  = $profile;
		$this->type     = $type;
		$this->username = $username;
	}

}
