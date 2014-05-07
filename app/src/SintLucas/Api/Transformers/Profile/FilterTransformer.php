<?php namespace SintLucas\Api\Transformers\Profile;

use League\Fractal\TransformerAbstract;
use SintLucas\Api\Transformers\Profile\FilterOptionTransformer;
use SintLucas\Domain\Profile\Models\Filter;

class FilterTransformer extends TransformerAbstract {

	/**
	 * List of resources possible to embed via this transformer
	 *
	 * @var array
	 */
	protected $availableEmbeds = array('options');

	protected $filterOptionTransformer;

	public function __construct(FilterOptionTransformer $filterOptionTransformer)
	{
		$this->filterOptionTransformer = $filterOptionTransformer;
	}

	/**
	 * Turn this item object into a generic array
	 *
	 * @return array
	 */
	public function transform(Filter $filter)
	{
		return $filter->toArray();
	}

	/**
	 * Embed Options
	 *
	 * @return League\Fractal\ItemResource
	 */
	public function embedOptions(Filter $filter)
	{
		$options = $filter->options;

		return $this->collection($options, $this->filterOptionTransformer);
	}
}
