<?php namespace SintLucas\Media\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'media_items';

	/**
	 * Has many relation with the link model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function links()
	{
		return $this->hasMany('SintLucas\Media\Models\Link');
	}

}
