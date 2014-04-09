<?php namespace SintLucas\Portfolio;

use SintLucas\Portfolio\Repos\ItemRepo;

class PortfolioService {

	/**
	 * ItemRepo instance.
	 *
	 * @var \SintLucas\Profile\Repos\ItemRepo
	 */
	protected $itemRepo;

	/**
	 * Create a new profile service instance.
	 *
	 * @param \SintLucas\Portfolio\Repos\ItemRepo $itemRepo
	 */
	public function __construct(ItemRepo $itemRepo)
	{
		$this->itemRepo = $itemRepo;
	}

	/**
	 * Get portfolio items by profile id.
	 *
	 * @param  int $profileId
	 * @return \Illuminate\Support\Collection
	 */
	public function getItemsByProfileId($profileId)
	{
		return $this->itemRepo->getBy(array('profile_id' => $profileId));
	}

}
