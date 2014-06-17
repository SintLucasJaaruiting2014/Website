<?php namespace SintLucas\Media\Image\Controller\Api;

use SintLucas\Media\Image\UseCase\FindImageRequest;
use SintLucas\Media\Image\UseCase\ImageListingRequest;
use SintLucas\Rest\Controller\RestController;

class ImageController extends RestController {

	public function index()
	{
		$request  = new ImageListingRequest();
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($id)
	{
		$request  = new FindImageRequest($id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}
}
