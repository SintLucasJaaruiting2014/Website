<?php namespace SintLucas\Domain\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'portfolio_types';

	/**
	 * Belongs to relation with the profile model.
	 *
	 * @return \Illuminate\Database\ELoquent\Relations\BelongsTo
	 */
	public function items()
	{
		return $this->hasMany('SintLucas\Domain\Portfolio\Models\Item');
	}

}
