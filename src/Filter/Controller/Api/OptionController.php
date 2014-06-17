<?php namespace SintLucas\Filter\Controller\Api;

use SintLucas\Filter\UseCase\OptionListingRequest;
use SintLucas\Rest\Controller\RestController;

class OptionController extends RestController {

	public function index($filterId)
	{
		$request = new OptionListingRequest($filterId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
