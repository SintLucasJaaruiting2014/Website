<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Profile\Traits\BelongsToProfile;

class SocialMedia extends Model {

	use BelongsToProfile;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_socialmedia';

	/**
	 * Belongs to relation with the social media type model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type()
	{
		return $this->belongsTo('SintLucas\Profile\Models\SocialMediaType');
	}

}
