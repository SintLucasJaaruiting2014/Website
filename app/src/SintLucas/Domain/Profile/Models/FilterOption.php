<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class FilterOption extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_filteroptions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'filter_id',
		'value'
	);

	/**
	 * Belongs to relation with the filter model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function filter()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Filter');
	}

}
