<?php namespace SintLucas\User\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'user_roles';

	/**
	 * Belongs to many relation with the user model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany('SintLucas\User\Models\User');
	}

}
