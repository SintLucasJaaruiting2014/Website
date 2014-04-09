<?php namespace SintLucas\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use SintLucas\Profile\Traits\BelongsToFilter;
use SintLucas\Profile\Traits\BelongsToProfile;

class ProfileProperty extends Model {

	use BelongsToFilter;
	use BelongsToProfile;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_profileproperty';

}
