<?php namespace SintLucas\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use SintLucas\Auth\Views\LoginView;
use SintLucas\Auth\Views\PasswordResetView;
use SintLucas\Auth\Views\ReminderView;

class AuthController extends Controller {

	/**
	 * Auth manager instance.
	 *
	 * @var \Illuminate\Auth\AuthManager
	 */
	protected $auth;

	/**
	 * Create a new auth controller instance.
	 *
	 * @param \Illuminate\Auth\AuthManager $auth
	 */
	public function __construct(AuthManager $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Show the login form.
	 *
	 * @return \SintLucas\Auth\Views\LoginView
	 */
	public function showLogin()
	{
		return new LoginView();
	}

	/**
	 * Attempt to login.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function login()
	{
		$credentials = Input::only(array('student_id', 'password'));
		if(Auth::attempt($credentials))
		{
			return Redirect::intended();
		}

		return Redirect::back()->with('error', 'Stamnummer en/of wachtwoord incorrect.');
	}

	/**
	 * Logout the current user.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout()
	{
		Auth::logout();

		return Redirect::action('auth.controller@showLogin');
	}

	/**
	 * Show the reminder view.
	 *
	 * @return \SintLucas\Auth\Views\ReminderView
	 */
	public function showReminder()
	{
		return new ReminderView();
	}

	/**
	 * Reset the user's password.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function sendReminder()
	{
		$response = Password::remind(Input::only('student_id'), function($message)
		{
			$message->subject('Wachtwoord resetten');
		});

		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
		}
	}

	/**
	 * Show the password reset form.
	 *
	 * @return \SintLucas\Auth\Views\PasswordResetView
	 */
	public function showPasswordReset($token)
	{
		if (is_null($token)) App::abort(404);

		return new PasswordResetView(compact('token'));
	}

	/**
	 * Reset the user's password.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function passwordReset()
	{
		$credentials = Input::only(
			'student_id', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/');
		}
	}
}
