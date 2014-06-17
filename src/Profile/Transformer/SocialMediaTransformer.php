<?php namespace SintLucas\Profile\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Profile\SocialMediaAccount;

class SocialMediaTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(SocialMediaAccount $account)
	{
		return array(
			'id'   => (int) $account->id,
			'type' => $account->type,
			'url'  => $account->url
		);
	}

}
