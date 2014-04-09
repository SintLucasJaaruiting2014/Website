<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_questions';

	/**
	 * Has many relation with the answer model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function answers()
	{
		return $this->hasMany('SintLucas\Profile\Models\Answer');
	}

}
