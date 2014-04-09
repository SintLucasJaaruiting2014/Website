<?php namespace SintLucas\School\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_programs';

	public function location()
	{
		return $this->belongsTo('SintLucas\School\Models\Location');
	}

	public function type()
	{
		return $this->belongsTo('SintLucas\School\Models\Type');
	}

	public function year()
	{
		return $this->belongsTo('SintLucas\School\Models\Year');
	}

}
