<?php namespace SintLucas\Filter;

class Option extends Model {

	protected $table = 'filteroptions';

	public function filter()
	{
		return $this->belongsTo('SintLucas\Filter\Filter');
	}

}
