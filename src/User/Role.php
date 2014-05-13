<?php namespace SintLucas\User;

class Role {

	const OLD_STUDENT = 0;
	const STUDENT     = 1;
	const INSPECTOR   = 2;
	const ADMIN       = 10;

	public static $roles = array(
		self::OLD_STUDENT => 'Oud student',
		self::STUDENT     => 'Student',
		self::INSPECTOR   => 'Nakijker',
		self::ADMIN       => 'Admin'
	);

}
