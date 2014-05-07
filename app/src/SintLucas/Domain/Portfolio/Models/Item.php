<?php namespace SintLucas\Domain\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'portfolio_items';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'profile_id',
		'type_id'
	);

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\ELoquent\Relations\BelongsTo
	 */
	public function profile()
	{
		return $this->belongsTo('SintLucas\Domain\Profile\Models\Profile');
	}

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\ELoquent\Relations\BelongsTo
	 */
	public function media()
	{
		return $this->morphOne('SintLucas\Domain\Media\Models\Item', 'linkable');
	}

	/**
	 * Belongs to relation with the type model.
	 *
	 * @return \Illuminate\Database\ELoquent\Relations\BelongsTo
	 */
	public function type()
	{
		return $this->belongsTo('SintLucas\Domain\Portfolio\Models\Type');
	}

}
