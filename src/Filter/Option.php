<?php namespace SintLucas\Filter;

use SintLucas\Core\Model;

class Option extends Model {

	protected $table = 'filter_options';

	public function filter()
	{
		return $this->belongsTo('SintLucas\Filter\Filter');
	}

}
