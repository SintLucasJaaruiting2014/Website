<?php namespace SintLucas\School\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\School\Traits\KlassTrait;

class Program extends Model {

	use KlassTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_programs';

}
