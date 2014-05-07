<?php namespace SintLucas\Seeds;

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder {

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
	 * Question repo instance.
	 *
	 * @var \SintLucas\Domain\Profile\Repos\QuestionRepo
	 */
	protected $questionRepo;

	/**
	 * All available school types.
	 *
	 * @var \Illuminate\Support\Collection
	 */
	protected $types;

	/**
	 * Create a new student seeder instance.
	 *
	 * @param array $data
	 */
	public function __construct($app, $data = array())
	{
		$this->app  = $app;
		$this->data = $data;

		$this->questionRepo = $app['profile.repo.question'];
		$this->typeRepo     = $app['school.repo.type'];
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach($this->data as $question)
		{
			$this->createQuestion($question);
		}
	}

	/**
	 * Create the question model.
	 *
	 * @param  array $question
	 * @return void
	 */
	public function createQuestion($question)
	{
		foreach($question['types'] as $type)
		{
			$type = $this->findOrCreateType($type);
			$model = $this->findOrCreate($this->questionRepo, array(
				'type_id' => $type->id,
				'label' => $question['label']
			));
		}
	}

	/**
	 * Get the type id by type name.
	 *
	 * @param  string $name
	 * @return int
	 */
	public function findOrCreateType($name)
	{
		if( ! $this->types)
		{
			$this->types = $this->typeRepo->all();
		}

		$model = $this->types->first(function($key, $value) use($name)
		{
			return $value->name == $name;
		});

		return $model ?: $this->findOrCreate($this->typeRepo, array(
			'name' => $name
		));
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
