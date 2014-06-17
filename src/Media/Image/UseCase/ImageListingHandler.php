<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Media\Image\ImageRepository;

class ImageListingHandler implements HandlerInterface {

	protected $imageRepository;

	public function __construct(ImageRepository $imageRepository)
	{
		$this->imageRepository = $imageRepository;
	}

	public function handle($command)
	{
		$images = $this->imageRepository->getPaginated();

		return new ImageListingResponse($images);
	}

}
