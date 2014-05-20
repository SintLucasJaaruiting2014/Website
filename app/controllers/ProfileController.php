<?php

use Illuminate\Http\Request;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Profile\ProfileRepository;

class FrontendController extends Controller {

	private $bus;
	private $profileRepository;
	private $request;

	public function __construct(CommandBus $bus, ProfileRepository $profiles, Request $request)
	{
		$this->bus               = $bus;
		$this->profileRepository = $profileRepository;
		$this->request           = $request;
	}

	public function index()
	{
		$profiles = $this->profileRepository->getPaginated();

		return ;
	}

}
