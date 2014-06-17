<?php namespace SintLucas\Filter\Transformer;

use League\Fractal\TransformerAbstract;
use SintLucas\Filter\Filter;

class FilterTransformer extends TransformerAbstract {

	protected $availableIncludes = array();

	public function transform(Filter $filter)
	{
		return array(
			'id' => (int) $filter->id,
			'multiple_choice' => (bool) $filter->multiple_choice,
			'label' => $filter->label,
			'options' => $filter->options->toArray()
		);
	}

}
