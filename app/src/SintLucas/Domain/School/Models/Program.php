<?php namespace SintLucas\Domain\School\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_programs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'name',
		'type_id'
	);

	/**
	 * Belongs to relation with the type model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type()
	{
		return $this->belongsTo('SintLucas\Domain\School\Models\Type');
	}
}
