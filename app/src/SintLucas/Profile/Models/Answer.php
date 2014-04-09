<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Profile\Traits\BelongsToProfile;

class Answer extends Model {

	use BelongsToProfile;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_answers';

	/**
	 * Belongs to relation with the question model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function question()
	{
		return $this->belongsTo('SintLucas\Profile\Models\Question');
	}

}
