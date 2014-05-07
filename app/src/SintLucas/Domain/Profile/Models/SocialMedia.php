<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_socialmedia';

	protected $with = array('type');

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'profile_id',
		'type_id',
		'username'
	);

	protected $appends = array('url');

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function profile()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Profile');
	}

	/**
	 * Belongs to relation with the social media type model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\SocialMediaType');
	}


	public function getUrlAttribute()
	{
		return str_replace('{username}', trim($this->username, '/'), $this->type->url);
	}
}
