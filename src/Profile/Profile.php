<?php namespace SintLucas\Profile;

class Profile extends Model {

	protected $table = 'profiles';

	public function user()
	{
		return $this->belongsTo('SintLucas\User\User');
	}

}
