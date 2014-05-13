<?php namespace SintLucas\Profile\Question;

use SintLucas\Core\Model;

class Question extends Model {

	protected $table = 'profile_questions';

	public function answers()
	{
		return $this->hasMany('SintLucas\Profile\Question\Answer');
	}

}
