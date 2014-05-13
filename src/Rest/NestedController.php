<?php namespace SintLucas\Rest;

use Illuminate\Routing\Controller as BaseController;

class NestedController extends BaseController {

	protected $related;
	protected $repository;

	public function __construct(EloquentRepository $related, EloquentRepository $repository)
	{
		$this->related = $related;
		$this->repository = $repository;
	}

	public function index($relatedId)
	{
		$related = $this->related->find($relatedId);

		$data = $this->repository->getRelated($related);

		return new Response($data->present());
	}

	public function show($relatedId, $id)
	{
		$related = $this->related->find($relatedId);

		$data = $this->repository->findRelated($related, $id);

		return new Response($data->present());
	}

	public function store($relatedId)
	{
		//
	}

	public function update($relatedId, $id)
	{
		//
	}

	public function destroy($relatedId, $id)
	{
		//
	}

}
