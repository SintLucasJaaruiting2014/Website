<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Media\Image\ImageRepository;

class FindImageHandler implements HandlerInterface {

	protected $imageRepository;

	public function __construct(ImageRepository $imageRepository)
	{
		$this->imageRepository = $imageRepository;
	}

	public function handle($command)
	{
		$images = $this->imageRepository->find($command->id);

		return new FindImageResponse($images);
	}

}
