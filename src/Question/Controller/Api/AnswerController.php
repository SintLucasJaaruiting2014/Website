<?php namespace SintLucas\Question\Controller\Api;

use SintLucas\Question\UseCase\FindAnswerRequest;
use SintLucas\Question\UseCase\AnswerListingRequest;
use SintLucas\Rest\Controller\RestController;

class AnswerController extends RestController {

	public function index($profileId)
	{
		$request = new AnswerListingRequest($profileId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($profileId, $id)
	{
		$request = new FindAnswerRequest($profileId, $id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

}
