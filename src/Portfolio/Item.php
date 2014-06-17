<?php namespace SintLucas\Portfolio;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $table = 'portfolio_items';

	protected $appends = array('type');

	public function profile()
	{
		return $this->belongsTo('SintLucas\Profile\Profile');
	}

	public function media()
	{
		return $this->morphTo();
	}

	public function getTypeAttribute()
	{
		return Type::get($this->attributes['type']);
	}
}
