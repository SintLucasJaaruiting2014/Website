<?php namespace SintLucas\Profile\UseCase;

use SintLucas\Media\Image\Image;
use SintLucas\Profile\Profile;
use SintLucas\School\Program;
use SintLucas\User\User;

class FindProfileResponse {

	public $profile;
	public $user;
	public $program;

	public function __construct(Profile $profile, Image $image, User $user, Program $program)
	{
		$this->profile = $profile;
		$this->user    = $user;
		$this->program = $program;
	}

}
