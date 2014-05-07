<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_answers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'profile_id',
		'question_id',
		'value'
	);

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function profile()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Profile');
	}

	/**
	 * Belongs to relation with the question model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function question()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Question');
	}

}
