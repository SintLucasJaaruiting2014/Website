<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImageRenameCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'image:rename';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Rename the profile images to the correct name.';

	protected $profiles;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		foreach(File::glob(base_path('data/images/*/*.jpg')) as $path)
		{
			$data = $this->parse($path);
			if($profile = $this->getProfile($data['studentId']))
			{
				$target = $this->formatName(
					$data['path'],
					$profile->program,
					$data['class'],
					$profile->first_name,
					$profile->last_name,
					$data['extension']
				);

				File::copy($path, $target);
			}
		}
	}

	public function getProfile($studentId)
	{
		if( ! $this->profiles)
		{
			$profiles = DB::table('profile_profiles')
				->selectRaw('user_users.student_id, profile_profiles.first_name, profile_profiles.last_name, school_programs.name as program')
				->join('user_users', 'user_users.id', '=', 'profile_profiles.user_id')
				->join('school_programs', 'school_programs.id', '=', 'profile_profiles.program_id')
				->get();

			foreach($profiles as $profile)
			{
				$this->profiles[$profile->student_id] = $profile;
			}
		}

		return array_get($this->profiles, $studentId);
	}

	public function formatName($path, $program, $class, $first_name, $last_name, $extension)
	{
		$program = Str::slug($program);
		return sprintf('%s/%s_%s_%s_%s.%s', $path, $program, $class, $first_name, $last_name, $extension);
	}

	public function parse($path)
	{
		$parts = explode('/', $path);

		$filename = array_pop($parts);
		$class    = array_pop($parts);
		$path     = implode('/', $parts);

		preg_match('/([0-9]+)_JAARUITING.(jpg)/', $filename, $match);

		list(, $studentId, $extension) = $match;

		return compact('path','class','studentId','extension');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
