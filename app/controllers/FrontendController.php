<?php

use Illuminate\Http\Request;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Profile\UseCases\ViewProfileRequest;

class FrontendController extends BaseController {

	protected $layout = 'layouts.master';

	public function __construct(CommandBus $bus, Request $request)
	{
		$this->bus     = $bus;
		$this->request = $request;
	}

	public function index()
	{
		$this->title = 'Overzicht';
		$this->renderView('frontend.index');
	}

	public function showProfile($id)
	{
		$request  = new ViewProfileRequest($id);
		$response = $this->bus->execute($request);

		$this->title = 'Profiel';
		$this->renderView('frontend.profile', array(
			'profile'               => $response->profile,
			'program'               => $response->program,
			'social_media_accounts' => $response->socialMediaAccounts,
			'user'                  => $response->user
		));
	}

}
