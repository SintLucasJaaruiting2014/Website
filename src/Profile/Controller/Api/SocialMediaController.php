<?php namespace SintLucas\Profile\Controller\Api;

use SintLucas\Profile\UseCase\SocialMediaListingRequest;
use SintLucas\Rest\Controller\RestController;

class SocialMediaController extends RestController {

	public function index($profileId)
	{
		$request = new SocialMediaListingRequest($profileId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}
}
