<?php namespace SintLucas\Question;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'profile_answers';

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

	public function question()
	{
		return $this->belongsTo('SintLucas\Question\Question');
	}

}
