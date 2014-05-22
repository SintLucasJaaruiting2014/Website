<?php namespace SintLucas\Profile;

use SintLucas\Core\Model;

class SocialMediaAccount extends Model {

	protected $table = 'profile_socialmedia';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

}
