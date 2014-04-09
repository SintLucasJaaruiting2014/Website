<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_profiles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'location_id',
		'program_id',
		'user_id',
		'year_id',
		'first_name',
		'last_name_prefix',
		'last_name',
		'quote'
	);

	/**
	 * Belongs to relation with the location model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function location()
	{
		return $this->belongsTo('SintLucas\School\Models\Location');
	}

	/**
	 * Belongs to relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function program()
	{
		return $this->belongsTo('SintLucas\School\Models\Program');
	}

	/**
	 * Belongs to relation with the user model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function user()
	{
		return $this->belongsTo('SintLucas\User\Models\User');
	}

	/**
	 * Belongs to relation with the year model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function year()
	{
		return $this->belongsTo('SintLucas\School\Models\Year');
	}
}
