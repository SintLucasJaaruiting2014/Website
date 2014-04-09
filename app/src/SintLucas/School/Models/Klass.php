<?php namespace SintLucas\School\Models;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'school_classess';

	/**
	 * Belongs to relation with the location model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function location()
	{
		return $this->belongsTo('SintLucas\School\Models\Location');
	}

	/**
	 * Belongs to relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function program()
	{
		return $this->belongsTo('SintLucas\School\Models\Program');
	}

	/**
	 * Belongs to relation with the type model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type()
	{
		return $this->belongsTo('SintLucas\School\Models\Type');
	}

	/**
	 * Belongs to relation with the year model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function year()
	{
		return $this->belongsTo('SintLucas\School\Models\Year');
	}

}
