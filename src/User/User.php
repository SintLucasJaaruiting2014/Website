<?php namespace SintLucas\User;

class User extends Model {

	protected $table = 'users';

	public function program()
	{
		return $this->belongsTo('SintLucas\School\Program');
	}

	public function properties()
	{
		return $this->belongsToMany('SintLucas\Search\Option', 'properties');
	}

}
