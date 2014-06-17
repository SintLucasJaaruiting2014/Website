<?php namespace SintLucas\Media\Image\Controller\Api;

use SintLucas\Media\Image\UseCase\FindCropRequest;
use SintLucas\Media\Image\UseCase\CropListingRequest;
use SintLucas\Rest\Controller\RestController;

class CropController extends RestController {

	public function index($imageId)
	{
		$request  = new CropListingRequest($imageId);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}

	public function show($imageId, $id)
	{
		$request  = new FindCropRequest($imageId, $id);
		$response = $this->bus->execute($request);

		return $this->json($response);
	}
}
