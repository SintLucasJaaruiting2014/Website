<?php namespace SintLucas\Profile\Controller\Api;

use SintLucas\Profile\UseCase\FindPropertyRequest;
use SintLucas\Profile\UseCase\PropertyListingRequest;
use SintLucas\Rest\Controller\RestController;

class PropertyController extends RestController {

	public function index($profileId)
	{
		$request = new PropertyListingRequest($profileId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($profileId, $id)
	{
		$request = new FindPropertyRequest($profileId, $id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
