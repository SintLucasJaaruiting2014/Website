<?php namespace SintLucas\User;

class Role {

	const ROLE_STUDENT = 0;
	const ROLE_CREW    = 1;
	const ROLE_GOD     = 10;

	public static $roles = array(
		self::ROLE_STUDENT => 'Student',
		self::ROLE_CREW    => 'Jaaruiting team',
		self::ROLE_GOD     => 'God'
	);

}
