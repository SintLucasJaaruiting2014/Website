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
	 * @var \SintLucas\Profile\Repos\QuestionRepo
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
		$this->types        = $app['school.repo.type']->all();
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
			$model = $this->questionRepo->create(array(
				'type_id' => $this->getTypeIdByName($type),
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
	public function getTypeIdByName($name)
	{
		$model = $this->types->first(function($key, $value) use($name)
		{
			return $value->name == $name;
		});

		return $model ? $model->id : 0;
	}
}
