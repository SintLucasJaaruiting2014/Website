<?php namespace SintLucas\Media\Traits;

trait MediaTrait {

	/**
	 * Morph many relation with the link model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function mediaItems()
	{
		return $this->morphMany('SintLucas\Media\Models\Link', 'linkable');
	}

}
