<?php namespace SintLucas\School\Traits;

trait HasManyPrograms {

	/**
	 * Has many relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function programs()
	{
		return $this->hasMany('SintLucas\School\Models\Program');
	}

}
