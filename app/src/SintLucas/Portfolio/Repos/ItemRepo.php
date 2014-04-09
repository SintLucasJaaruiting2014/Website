<?php namespace SintLucas\Portfolio\Repos;

use SintLucas\Portfolio\Models\Item;

class ItemRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\Portfolio\Models\Item
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\Portfolio\Models\Item $model
	 */
	public function __construct(Item $model)
	{
		$this->model = $model;
	}

}
