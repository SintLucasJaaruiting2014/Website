<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class AuthController extends BaseController {

	protected $layout = 'layouts.auth';

	public function __construct(AuthManager $auth, Request $request, SessionManager $session)
	{
		$this->auth    = $auth;
		$this->request = $request;
		$this->session = $session;
	}

	public function showLogin()
	{
		$this->title = 'Login';
		$this->renderView('auth.login');
	}

	public function login()
	{
		//
	}

}
