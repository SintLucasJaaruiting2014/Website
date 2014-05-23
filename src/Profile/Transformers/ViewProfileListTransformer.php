<?php namespace SintLucas\Profile\Transformers;

class ViewProfileListTransformer extends TransformerAbstract {

	public function transform(ViewProfileListResponse $response)
	{
		return $response->toArray();
	}

}
