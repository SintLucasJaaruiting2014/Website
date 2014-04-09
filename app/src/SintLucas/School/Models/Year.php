<?php namespace SintLucas\School\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\School\Traits\HasManyPrograms;

class Year extends Model {

	use HasManyPrograms;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_years';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'name'
	);

}
