<?php namespace SintLucas\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Reminder\PasswordBroker;

class AuthService {

	protected $auth;
	protected $password;

	public function __construct(AuthManager $auth, PasswordBroker $password)
	{
		$this->auth     = $auth;
		$this->password = $password;
	}

	public function login($credentials = array())
	{
		//
	}

	public function logout($credentials = array())
	{
		//
	}

	public function sendReminder($credentials = array())
	{
		//
	}

	public function resetPassword($credentials = array())
	{
		//
	}

}
