<?php namespace SintLucas\Question;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Profile\Profile;

class Question extends Model {

	protected $table = 'profile_questions';

	public function answers()
	{
		return $this->hasMany('SintLucas\Question\Answer');
	}

	public function answer(Profile $profile, $value)
	{
		return new Answer(array(
			'question_id' => $this->id,
			'profile_id'  => $profile->id,
			'value'       => $value
		));
	}

}
