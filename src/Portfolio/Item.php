<?php namespace SintLucas\Portfolio;

use SintLucas\Core\Model;

class Item extends Model {

	protected $table = 'portfolio_items';

	protected $appends = array('type');
	protected $hidden = array('type_id');

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
		return Type::get($this->type);
	}
}
