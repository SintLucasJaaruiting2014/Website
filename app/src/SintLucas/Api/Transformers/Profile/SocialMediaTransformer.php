<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Domain\Profile\Models\SocialMedia;

class SocialMediaTransformer extends TransformerAbstract {

	/**
	 * List of resources possible to embed via this transformer
	 *
	 * @var array
	 */
	protected $availableEmbeds = array();

	/**
	 * Turn this item object into a generic array
	 *
	 * @return array
	 */
	public function transform(SocialMedia $socialMedia)
	{
		return array(
			'id' => (int) $socialMedia->id,
			'url' => $socialMedia->url,
			'type' => $socialMedia->type->name,
			'icon' => $socialMedia->type->icon
		);
	}

}
