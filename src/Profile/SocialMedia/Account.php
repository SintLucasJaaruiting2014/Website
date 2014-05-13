<?php namespace SintLucas\Profile\SocialMedia;

use SintLucas\Core\Model;

class Account extends Model {

	protected $table = 'profile_socialmedia';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

}
