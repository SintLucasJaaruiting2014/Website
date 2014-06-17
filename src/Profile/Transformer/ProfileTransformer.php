<?php namespace SintLucas\Profile\Transformer;

use Illuminate\Routing\UrlGenerator;
use League\Fractal\TransformerAbstract;
use SintLucas\Profile\Profile;

class ProfileTransformer extends TransformerAbstract {

	protected $url;

	public function __construct(UrlGenerator $url)
	{
		$this->url = $url;
	}

	public function transform(Profile $profile)
	{
		return array(
			'id'         => $profile->id,
			'program'    => array(
				'name' => $profile->program->name,
				'location' => $profile->program->location->name,
			),
			'student_id' => $profile->student_id,
			'first_name' => $profile->user->first_name,
			'last_name'  => $profile->user->last_name,
			'year'       => $profile->year,
			'email'      => $profile->email,
			'website'    => $profile->website,
			'location'   => $profile->location,
			'quote'      => $profile->quote,
			'picture'    => array(
				'grid'    => $this->url->route('imagecache', array('grid', $profile->picture->filename)),
				'profile' => $this->url->route('imagecache', array('profile', $profile->picture->filename)),
				'network' => $this->url->route('imagecache', array('network', $profile->picture->filename))
			),
			'properties' => $profile->properties->lists('id')
		);
	}
}
