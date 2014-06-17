<?php namespace SintLucas\Portfolio\Controller\Api;

use SintLucas\Portfolio\UseCase\FindItemRequest;
use SintLucas\Portfolio\UseCase\ItemListingRequest;
use SintLucas\Rest\Controller\RestController;

class PortfolioController extends RestController {

	public function index($profileId)
	{
		$request = new ItemListingRequest($profileId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($profileId, $id)
	{
		$request = new FindItemRequest($profileId, $id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
