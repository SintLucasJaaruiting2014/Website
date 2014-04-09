<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_filters';

	/**
	 * Has many relation with the option model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function options()
	{
		return $this->hasMany('SintLucas\Profile\Models\Option');
	}

}
