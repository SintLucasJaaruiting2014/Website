<?php namespace SintLucas\School;

use SintLucas\Core\Model;

class Program extends Model {

	protected $table = 'school_programs';

	public function users()
	{
		return $this->hasMany('SintLucas\User\User');
	}

	public function getTypeAttribute()
	{
		return Type::$types[$this->type_id];
	}

}
