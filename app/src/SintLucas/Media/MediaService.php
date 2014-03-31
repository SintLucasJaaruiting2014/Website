<?php namespace SintLucas\Media;

class MediaService {

	/**
	 * Image repository instance.
	 *
	 * @var \SintLucas\Media\Repos\ImageRepo
	 */
	protected $imageRepo;

	/**
	 * Media repository instance.
	 *
	 * @var \SintLucas\Media\Repos\MediaRepo
	 */
	protected $mediaRepo;

	/**
	 * Video repositories
	 *
	 * @var \SintLucas\Media\Repos\VideoRepo
	 */
	protected $videoRepo;

	/**
	 * Create a new media service instance.
	 *
	 * @param \SintLucas\Media\Repos\ImageRepo $imageRepo
	 * @param \SintLucas\Media\Repos\MediaRepo $mediaRepo
	 * @param \SintLucas\Media\Repos\VideoRepo $videoRepo
	 */
	public function __construct(ImageRepo $imageRepo, MediaRepo $mediaRepo, VideoRepo $videoRepo)
	{
		$this->imageRepo = $imageRepo;
		$this->mediaRepo = $mediaRepo;
		$this->videoRepo = $videoRepo;
	}

}