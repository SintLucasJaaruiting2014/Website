<?php namespace SintLucas\Filter\Controller\Api;

use SintLucas\Filter\UseCase\FilterListingRequest;
use SintLucas\Rest\Controller\RestController;

class FilterController extends RestController {

	public function index()
	{
		$request = new FilterListingRequest();
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
