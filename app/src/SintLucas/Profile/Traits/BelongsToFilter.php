<?php namespace SintLucas\Profile\Traits;

trait BelongsToFilter {

	/**
	 * Belongs to relation with the filter model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function filter()
	{
		return $this->belongsTo('SintLucas\Profile\Models\Filter');
	}

}
