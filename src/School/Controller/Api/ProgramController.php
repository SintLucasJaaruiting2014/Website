<?php namespace SintLucas\School\Controller\Api;

use SintLucas\School\UseCase\FindProgramRequest;
use SintLucas\School\UseCase\ProgramListingRequest;
use SintLucas\Rest\Controller\RestController;

class ProgramController extends RestController {

	public function index()
	{
		$request = new ProgramListingRequest();
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($id)
	{
		$request = new FindProgramRequest($id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
