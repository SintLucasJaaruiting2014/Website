<?php namespace SintLucas\Domain\School\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_types';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'name'
	);

	/**
	 * Has many relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function programs()
	{
		return $this->hasMany('SintLucas\Domain\School\Models\Program');
	}
}
