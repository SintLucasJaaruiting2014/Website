<?php namespace SintLucas\Media\Repos;

use SintLucas\Media\Models\Item;

class ItemRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\Media\Models\Item
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\Media\Models\Item $model
	 */
	public function __construct(Item $model)
	{
		$this->model = $model;
	}

}
