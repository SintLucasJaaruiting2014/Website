<?php namespace SintLucas\Filter;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

	protected $table = 'filter_options';

	protected $hidden = array('filter_id');

	public function filter()
	{
		return $this->belongsTo('SintLucas\Filter\Filter');
	}

}
