<?php namespace SintLucas\School\Traits;

trait KlassTrait {

	/**
	 * Has many relation with the klass model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function klasses()
	{
		return $this->hasMany('SintLucas\School\Models\Klass');
	}

}
