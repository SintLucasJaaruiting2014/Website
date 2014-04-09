<?php namespace SintLucas\Profile\Traits;

trait BelongsToProfile {

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Models\Profile');
	}

}
