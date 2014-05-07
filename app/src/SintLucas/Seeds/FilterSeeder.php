<?php namespace SintLucas\Seeds;

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder {

	/**
	 * The application instance.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;

	/**
	 * Data to be seeder.
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Filter repo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\FilterRepo
	 */
	protected $filterRepo;

	/**
	 * Option repo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\OptionRepo
	 */
	protected $optionRepo;

	/**
	 * Create a new student seeder instance.
	 *
	 * @param array $data
	 */
	public function __construct($app, $data = array())
	{
		$this->app  = $app;
		$this->data = $data;

		$this->filterRepo = $app['profile.repo.filter'];
		$this->optionRepo = $app['profile.repo.filteroption'];
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach($this->data as $filter)
		{
			$this->createFilter($filter);
		}
	}

	/**
	 * Create the filter model.
	 *
	 * @param  array $filter
	 * @return void
	 */
	public function createFilter($filter)
	{
		$data = array(
			'label' => $filter['label'],
			'multiple_choice' => $filter['multiple_choice']
		);
		$model = $this->findOrCreate($this->filterRepo, $data);

		$this->createOptions($model->id, $filter['options']);
	}

	/**
	 * Create the option models.
	 *
	 * @param  int   $filterId
	 * @param  array $options
	 * @return void
	 */
	public function createOptions($filterId, $options = array())
	{
		foreach($options as $option)
		{
			$this->findOrCreate($this->optionRepo, array(
				'filter_id' => $filterId,
				'value' => $option
			));
		}
	}

	/**
	 * Find or create a model.
	 *
	 * @param  \SintLucas\Core\Interfaces\CrudRepoInterface $repo
	 * @param  string                                       $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	protected function findOrCreate($repo, $data)
	{
		if($model = $repo->findBy($data))
		{
			return $model;
		}

		return $repo->create($data);
	}
}
