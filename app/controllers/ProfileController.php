<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Core\SeedGenerator;
use SintLucas\Profile\ProfileRepository;
use SintLucas\Profile\UseCases\ViewProfileListRequest;
use SintLucas\Profile\UseCases\ViewProfileRequest;

class ProfileController extends BaseController {

	private $bus;
	private $request;
	private $seedGenerator;
	private $session;

	public function __construct(CommandBus $bus, Request $request, SeedGenerator $seedGenerator, SessionManager $session)
	{
		$this->bus           = $bus;
		$this->request       = $request;
		$this->seedGenerator = $seedGenerator;
		$this->session       = $session;
	}

	public function index()
	{
		$request  = new ViewProfileListRequest($this->getSeed());
		$response = $this->bus->execute($request);

		// $this->renderView();
	}

	public function show($id)
	{
		$request = new ViewProfileRequest($id);

		$response = $this->bus->execute($request);

		dd($response);
	}

	public function getSeed()
	{
		if( ! $this->session->has('seed'))
		{
			$seed = $this->seedGenerator->generate();

			$this->session->put('seed', $seed);
		}

		return $this->session->get('seed');
	}

}
