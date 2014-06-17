<?php namespace SintLucas\Profile;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $table = 'profile_profiles';

	public function program()
	{
		return $this->belongsTo('SintLucas\School\Program');
	}

	public function properties()
	{
		return $this->belongsToMany('SintLucas\Filter\Option', 'profile_properties');
	}

	public function socialMediaAccounts()
	{
		return $this->hasMany('SintLucas\Profile\SocialMediaAccount');
	}

	public function user()
	{
		return $this->belongsTo('SintLucas\User\User');
	}

	public function picture()
	{
		return $this->belongsTo('SintLucas\Media\Image\Image', 'image_id');
	}
}
