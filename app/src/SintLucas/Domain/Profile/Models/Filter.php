<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_filters';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'multiple_choice',
		'label'
	);

	/**
	 * Has many relation with the option model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function options()
	{
		return $this->hasMany('SintLucas\Domain\Profile\Models\FilterOption');
	}

}
