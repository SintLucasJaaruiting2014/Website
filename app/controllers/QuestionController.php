<?php

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Profile\UseCases\ViewProfileListRequest;
use SintLucas\Profile\UseCases\ViewProfileRequest;

class QuestionController extends BaseController {

	private $bus;
	private $request;
	private $session;

	public function __construct(AuthManager $auth, CommandBus $bus, Request $request, SessionManager $session)
	{
		$this->auth    = $auth;
		$this->bus     = $bus;
		$this->request = $request;
		$this->session = $session;
	}

	public function index()
	{
		$this->render('question.index');
	}

	public function showQuestion()
	{
		$this->render('question.question');
	}

	public function answer()
	{
		$request = new AnswerQuestionRequest(
			$this->auth->user(),
			$this->request->get('question'),
			$this->request->get('answer')
		);
	}

}
