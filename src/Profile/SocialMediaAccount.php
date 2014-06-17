<?php namespace SintLucas\Profile;

use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model {

	protected $table = 'profile_socialmedia';

	/**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $appends = array('url');

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

	public function getUrlAttribute()
	{
		return SocialMediaType::url($this->type, $this->username);
	}
}
