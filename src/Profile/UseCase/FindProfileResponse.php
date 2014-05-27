<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Profile\Profile;
use SintLucas\School\Program;
use SintLucas\User\User;

class FindProfileResponse {

	public $profile;
	public $user;
	public $program;
	public $socialMediaAccounts;

	public function __construct(Profile $profile, User $user, Program $program, $socialMediaAccounts)
	{
		$this->profile             = $profile;
		$this->user                = $user;
		$this->program             = $program;
		$this->socialMediaAccounts = $socialMediaAccounts;
	}

}
