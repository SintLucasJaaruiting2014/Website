<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Media\Image\CropRepository;
use SintLucas\Media\Image\ImageRepository;

class CropListingHandler implements HandlerInterface {

	protected $cropRepository;
	protected $imageRepository;

	public function __construct(ImageRepository $imageRepository, CropRepository $cropRepository)
	{
		$this->cropRepository  = $cropRepository;
		$this->imageRepository = $imageRepository;
	}

	public function handle($command)
	{
		$image = $this->imageRepository->find($command->imageId);
		$crops = $this->cropRepository->getBy($image);

		return new CropListingResponse($image, $crops);
	}

}
