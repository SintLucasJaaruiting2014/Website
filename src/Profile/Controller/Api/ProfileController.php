<?php namespace SintLucas\Profile\Controller\Api;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use SintLucas\CommandBus\CommandBus;
use SintLucas\Core\SeedGenerator;
use SintLucas\Profile\UseCase\FindProfileRequest;
use SintLucas\Profile\UseCase\ProfileListingRequest;
use SintLucas\Rest\Controller\RestController;
use SintLucas\Rest\Response\Transformer;

class ProfileController extends RestController {

	protected $seedGenerator;

	public function __construct(CommandBus $bus, Request $request, SessionManager $session, Transformer $transformer, SeedGenerator $seedGenerator)
	{
		parent::__construct($bus, $request, $session, $transformer);
		$this->seedGenerator = $seedGenerator;
	}

	protected function getSeed()
	{
		if( ! $this->session->has('seed'))
		{
			$seed = $this->seedGenerator->generate();

			$this->session->put('seed', $seed);
		}

		return $this->session->get('seed');
	}

	public function index()
	{
		$request  = new ProfileListingRequest(
			$this->getSeed(),
			$this->request->get('page', 1),
			$this->request->get('perPage', 72)
		);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($id)
	{
		$request  = new FindProfileRequest($id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}
}
