<?php namespace SintLucas\Domain\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_profiles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'location_id',
		'program_id',
		'user_id',
		'year_id',
		'first_name',
		'last_name_prefix',
		'last_name',
		'email',
		'quote',
		'website',
		'location',
		'approved'
	);

	/**
	 * Has many relation with the program answer.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function answers()
	{
		return $this->hasMany('SintLucas\Domain\Profile\Models\Answer');
	}

	/**
	 * Has many relation with the filters model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function filters()
	{
		$pivotModel = $this->properties()->getRelated();
		return $this->belongsToMany(
			'SintLucas\Domain\Profile\Models\Filter',
			$pivotModel->getTable()
		)->withPivot('id', 'option_id');
	}

	/**
	 * Has many relation with the portfolio item model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function portfolioItems()
	{
		return $this->hasMany('SintLucas\Domain\Portfolio\Models\Item');
	}

	/**
	 * Belongs to relation with the program model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function program()
	{
		return $this->belongsTo('SintLucas\Domain\School\Models\Program');
	}

	/**
	 * Has many relation with the property model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function properties()
	{
		return $this->hasMany('SintLucas\Domain\Profile\Models\ProfileProperty');
	}

	/**
	 * Belongs to relation with the location model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function schoolLocation()
	{
		return $this->belongsTo('SintLucas\Domain\School\Models\Location', 'location_id');
	}

	/**
	 * Has many relation with the social media model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function socialMedia()
	{
		return $this->hasMany('SintLucas\Domain\Profile\Models\SocialMedia');
	}

	/**
	 * Belongs to relation with the user model.
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function user()
	{
		return $this->belongsTo('SintLucas\Domain\User\Models\User');
	}

	/**
	 * Belongs to relation with the year model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function year()
	{
		return $this->belongsTo('SintLucas\Domain\School\Models\Year');
	}

	/**
	 * Getter for the approved attribute.
	 *
	 * @param  string $approved
	 * @return bool
	 */
	public function getApprovedAttribute($approved)
	{
		return (bool) $approved;
	}

	/**
	 * Setter for the approved attribute.
	 *
	 * @param mixed $approved
	 */
	public function setApprovedAttribute($approved)
	{
		if(in_array($approved, array(true, 1, '1', 'y', 'yes')))
		{
			$value = 1;
		}
		else
		{
			$value = 0;
		}

		$this->attributes['approved'] = $value;
	}

	public function setWebsiteAttribute($url)
	{
		if ( ! empty($url) and ! preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}

		$this->attributes['website'] = $url;
	}
}
