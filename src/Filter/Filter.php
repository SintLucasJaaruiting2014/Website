<?php namespace SintLucas\Filter;

use SintLucas\Core\Model;

class Filter extends Model {

	protected $table = 'filter_filters';

	public function options()
	{
		return $this->hasMany('SintLucas\Filter\Option');
	}

}
