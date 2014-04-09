<?php namespace SintLucas\Media;

use SintLucas\Media\Repos\LinkRepo;
use SintLucas\Media\Repos\ItemRepo;

class MediaService {

	/**
	 * Item repository instance.
	 *
	 * @var \SintLucas\Media\Repos\ItemRepo
	 */
	protected $itemRepo;

	/**
	 * Link repository instance.
	 *
	 * @var \SintLucas\Media\Repos\LinkRepo
	 */
	protected $linkRepo;

	/**
	 * Create a new media service instance.
	 *
	 * @param \SintLucas\Media\Repos\ImageRepo $itemRepo
	 * @param \SintLucas\Media\Repos\LinkRepo  $linkRepo
	 */
	public function __construct(ItemRepo $itemRepo, LinkRepo $linkRepo)
	{
		$this->itemRepo = $itemRepo;
		$this->linkRepo = $linkRepo;
	}

}
