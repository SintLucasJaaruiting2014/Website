<?php namespace SintLucas\Profile\Question;

use SintLucas\Core\Model;

class Answer extends Model {

	protected $table = 'profile_answers';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

	public function question()
	{
		return $this->belongsTo('SintLucas\Profile\Question\Question');
	}

}
