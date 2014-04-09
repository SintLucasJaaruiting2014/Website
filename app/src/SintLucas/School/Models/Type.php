<?php namespace SintLucas\School\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\School\Traits\HasManyPrograms;

class Type extends Model {

	use HasManyPrograms;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_types';

}
