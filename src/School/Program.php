<?php namespace SintLucas\School;

class Program extends Model {

	protected $table = 'programs';

	public function users()
	{
		return $this->hasMany('SintLucas\User\User');
	}

	public function getTypeAttribute()
	{
		return Type::$types[$this->type];
	}

}
