<?php namespace SintLucas\School\Controller\Api;

use SintLucas\School\UseCase\FindLocationRequest;
use SintLucas\School\UseCase\LocationListingRequest;
use SintLucas\Rest\Controller\RestController;

class LocationController extends RestController {

	public function index()
	{
		$request = new LocationListingRequest();
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($id)
	{
		$request = new FindLocationRequest($id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
