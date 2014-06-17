<?php namespace SintLucas\Profile;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	protected $table = 'profile_properties';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}
}
