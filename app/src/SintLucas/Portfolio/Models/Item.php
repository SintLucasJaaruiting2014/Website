<?php namespace SintLucas\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'portfolio_items';

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\ELoquent\Relations\BelongsTo
	 */
	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Models\Profile');
	}

}
