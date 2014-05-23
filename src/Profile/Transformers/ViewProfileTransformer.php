<?php namespace SintLucas\Profile\Transformers;

use League\Fractal\TransformerAbstract;

class ViewProfileTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(ViewProfileResponse $response)
	{
		$this->response = $response.

		return $this->response->toArray();
	}

}
