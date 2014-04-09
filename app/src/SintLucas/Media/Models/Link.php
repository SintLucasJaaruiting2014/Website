<?php namespace SintLucas\Media\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'media_links';

	/**
	 * Polymorphic relation.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function linkable()
	{
		return $this->morphTo();
	}

	/**
	 * Relation with the media item model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function item()
	{
		return $this->belongsTo('SintLucas\Media\Models\Item');
	}

}
