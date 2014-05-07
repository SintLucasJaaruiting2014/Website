<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Domain\Profile\Collections\PropertyCollection;

class ProfileProperty extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_profileproperty';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'filter_id',
		'option_id',
		'profile_id'
	);

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @param  array  $models
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function newCollection(array $models = array())
	{
		return new PropertyCollection($models);
	}

	/**
	 * Belongs to relation with the filter model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function filter()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Filter');
	}

	/**
	 * Belongs to relation with the filter option model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function option()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\FilterOption');
	}

}
