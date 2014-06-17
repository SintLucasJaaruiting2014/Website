<?php namespace SintLucas\School;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	protected $table = 'school_locations';

	public function programs()
	{
		return $this->hasMany('SintLucas\School\Program');
	}
}
