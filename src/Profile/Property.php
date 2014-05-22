<?php namespace SintLucas\Profile;

use SintLucas\Core\Model;

class Property extends Model {

	protected $table = 'profile_properties';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

	public function addProperties()
	{
		//
	}
}
