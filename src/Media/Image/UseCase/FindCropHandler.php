<?php namespace SintLucas\Media\Image\UseCase;

use SintLucas\CommandBus\HandlerInterface;
use SintLucas\Media\Image\CropRepository;
use SintLucas\Media\Image\Exception\ImageNotFoundException;
use SintLucas\Media\Image\ImageRepository;

class FindCropHandler implements HandlerInterface {

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
		if($image === null)
		{
			throw new ImageNotFoundException("Image not found: {$command->imageId}");
		}

		$crop  = $this->cropRepository->findByImageAndConfig($image, $command->config);

		return new FindCropResponse($image, $crop);
	}

}
