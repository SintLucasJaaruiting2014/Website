<?php namespace SintLucas\Rest;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

	protected $repository;

	public function __construct(EloquentRepository $repository)
	{
		$this->repository = $repository;
	}

	public function index()
	{
		$data = $this->repository->allPaginated();

		return new Response($data);
	}

	public function show($id)
	{
		$record = $this->repository->find($id);

		return new Response($record->present());
	}

	public function store()
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
