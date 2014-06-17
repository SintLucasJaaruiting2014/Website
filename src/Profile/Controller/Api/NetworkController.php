<?php namespace SintLucas\Profile\Controller\Api;

use SintLucas\Profile\UseCase\NetworkListingRequest;
use SintLucas\Rest\Controller\RestController;

class NetworkController extends RestController {

	public function index($profileId)
	{
		$request = new NetworkListingRequest($profileId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}
}
