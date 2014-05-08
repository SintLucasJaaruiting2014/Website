<?php namespace SintLucas\Filter;

class Filter extends Model {

	protected $table = 'filters';

	public function options()
	{
		return $this->hasMany('SintLucas\Filter\Option');
	}

}
