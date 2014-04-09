<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class FilterOption extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_filteroptions';

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
