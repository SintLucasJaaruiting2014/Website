<?php namespace SintLucas\Profile\Repos;

use SintLucas\Profile\Models\SocialMedia;

class SocialMediaRepo {

	/**
	 * Social media model instance.
	 *
	 * @var \SintLucas\Profile\Models\SocialMedia
	 */
	protected $model;

	/**
	 * Create a new social media repository instance.
	 *
	 * @param \SintLucas\Profile\Models\SocialMedia $model
	 */
	public function __construct(SocialMedia $model)
	{
		$this->model = $model;
	}

}
