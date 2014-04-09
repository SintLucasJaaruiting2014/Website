<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Profile\Traits\BelongsToFilter;

class FilterOption extends Model {

	use BelongsToFilter;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_filteroptions';

}
