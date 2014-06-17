<?php namespace SintLucas\School;

use Illuminate\Database\Eloquent\Model;

class Program extends Model {

	protected $table = 'school_programs';

	public function location()
	{
		return $this->belongsTo('SintLucas\School\Location');
	}

	public function profiles()
	{
		return $this->hasMany('SintLucas\Profile\Profile');
	}

	public function getTypeAttribute($type)
	{
		return Type::$types[$type];
	}

}
