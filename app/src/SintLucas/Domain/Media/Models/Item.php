<?php namespace SintLucas\Domain\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Item extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'media_items';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'linkable_id',
		'linkable_type',
		'type',
		'value'
	);

	/**
	 * Polymorphic relation morph to relation.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function linkable()
	{
		return $this->morphTo();
	}

	public function getFilenameAttribute()
	{
		$value = $this->attributes['value'];
		return sprintf('%s.%s', $this->id, $value);
	}

	public function getThumbnailAttribute()
	{
		switch($this->type)
		{
			case 'image':
				return $this->imageUrl('dcthumb');

			case 'video':
			default:
				return null;
		}
	}

	public function getOriginalAttribute()
	{
		switch($this->type)
		{
			case 'image':
				return $this->imageUrl('original');

			case 'video':
			default:
				return null;
		}
	}

	public function getValueAttribute($value)
	{
		switch($this->type)
		{
			case 'image':
				return $this->imageUrl('large');

			case 'video':
			default:
				return $value;
		}
	}

	protected function imageUrl($config)
	{
		return URL::route('imagecache', array($config, $this->filename));
	}

}
