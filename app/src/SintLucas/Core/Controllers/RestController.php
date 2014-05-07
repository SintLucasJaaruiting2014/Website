<?php namespace SintLucas\Core\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use SintLucas\Core\Interfaces\CrudRepoInterface;

class RestController extends Controller {

	protected $repo;
	protected $transformer;

	public function __construct(CrudRepoInterface $repo, Manager $fractal,
		TransformerAbstract $transformer)
	{
		$this->repo        = $repo;
		$this->fractal     = $fractal;
		$this->transformer = $transformer;
	}

	protected function response($resource, $status = 200)
	{
		$data = $this->fractal->createData($resource)->toArray();
		return Response::json($data, $status);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$embeds  = Input::get('embeds');
		$perPage = Input::get('perPage', 30);
		$search  = Input::get('search');
		$sort    = json_decode(Input::get('sort', '[]'), true);

		$illuminatePaginator = $this->repo->paginate($perPage, $sort, $search);
		$items = $illuminatePaginator->getCollection();

		$resource = new Collection($items, $this->transformer);
		$paginator = new IlluminatePaginatorAdapter($illuminatePaginator);

		$paginator->addQuery('embeds', $embeds);
		$paginator->addQuery('perPage', $perPage);
		$paginator->addQuery('search', $search);
		$paginator->addQuery('sort', $sort);

		$resource->setPaginator($paginator);

		return $this->response($resource);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::get();

		$item = $this->repo->create($data);

		$resource = new Item($item, $this->transformer);

		return $this->response($resource, 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = $this->repo->find($id);

		$resource = new Item($item, $this->transformer);

		return $this->response($resource);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::get();

		$model = $this->repo->find($id);
		$item  = $this->repo->update($model, $data);

		$resource = new Item($item, $this->transformer);

		return $this->response($resource, 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
