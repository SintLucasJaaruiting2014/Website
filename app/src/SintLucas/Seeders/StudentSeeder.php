<?php namespace SintLucas\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {

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
	 * Keys for the incoming data.
	 *
	 * @var array
	 */
	protected $keys = array(
		'studentId',
		'firstName',
		'lastNamePrefix',
		'lastName',
		'program',
		'type',
		'year',
		'location',
		'email'
	);

	/**
	 * Create a new student seeder instance.
	 *
	 * @param array $data
	 */
	public function __construct($app, $data = array())
	{
		$this->app = $app;

		$this->data = array();
		foreach($data as $values)
		{
			$this->data[] = array_combine($this->keys, $values);
		}
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$locations = $this->createLocations();
		$types     = $this->createTypes();
		$years     = $this->createYears();
		$programs  = $this->createPrograms($types);
		$this->createUsersAndProfiles($locations, $programs, $years);
	}

	/**
	 * Get all the locations from the data and create them.
	 *
	 * @return array
	 */
	public function createLocations()
	{
		return $this->createUniqueRecords('school.repo.location', 'location', 'name');
	}

	/**
	 * Get all the types from the data and create them.
	 *
	 * @return array
	 */
	public function createTypes()
	{
		return $this->createUniqueRecords('school.repo.type', 'type', 'name');
	}

	/**
	 * Get all the year from the data and create them.
	 *
	 * @return array
	 */
	public function createYears()
	{
		return $this->createUniqueRecords('school.repo.year', 'year', 'name');
	}

	/**
	 * Get all the programs from the data and create them.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function createPrograms($types)
	{
		$repo = $this->app['school.repo.program'];

		$programs = array();
		foreach($this->data as $record)
		{
			if( ! isset($programs[$record['program']]))
			{
				$programs[$record['program']] = $this->findOrCreate($repo, array(
					'type_id' => $types[$record['type']]->id,
					'name'    => $record['program']
				));
			}
		}

		return $programs;
	}

	/**
	 * Get all the students from the data and create the users and profiles.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function createUsersAndProfiles($locations, $programs, $years)
	{
		$profileRepo = $this->app['profile.repo.profile'];
		$userRepo = $this->app['user.repo.user'];

		foreach($this->data as $record)
		{
			$user = $this->findOrCreate($userRepo, array(
				'school_email' => $record['email']
			));

			$profile = $this->findOrCreate($profileRepo, array(
				'location_id'      => $locations[$record['location']]->id,
				'program_id'       => $programs[$record['program']]->id,
				'user_id'          => $user->id,
				'year_id'          => $years[$record['year']]->id,
				'first_name'       => $record['firstName'],
				'last_name_prefix' => $record['lastNamePrefix'],
				'last_name'        => $record['lastName']
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

	/**
	 * Get all the locations from the data and create them.
	 *
	 * @return array
	 */
	protected function createUniqueRecords($repo, $source, $target)
	{
		$repo = $this->app[$repo];

		$values = array_unique(array_pluck($this->data, $source));

		$models = array();
		foreach($values as $value)
		{
			$models[$value] = $this->findOrCreate($repo, array($target => $value));
		}

		return $models;
	}

}
