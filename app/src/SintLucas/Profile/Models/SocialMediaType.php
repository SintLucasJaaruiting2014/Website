<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaType extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_socialmediatypes';

	/**
	 * Has many relation with the social media model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function socialmedias()
	{
		return $this->hasMany('SintLucas\Profile\Models\SocialMedia');
	}

}
