<?php namespace SintLucas\Filter\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Filter\Option;

class OptionTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(Option $option)
	{
		return array(
			'id' => (int) $option->id,
			'label' => $option->label
		);
	}

}
