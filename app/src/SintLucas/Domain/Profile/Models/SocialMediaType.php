<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Domain\Profile\Collections\SocialMediaTypeCollection;

class SocialMediaType extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_socialmediatypes';

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @param  array  $models
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function newCollection(array $models = array())
	{
		return new SocialMediaTypeCollection($models);
	}

	/**
	 * Has many relation with the social media model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function socialmedias()
	{
		return $this->hasMany('SintLucas\Domain\Profile\Models\SocialMedia');
	}

}
