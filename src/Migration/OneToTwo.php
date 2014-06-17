<?php namespace SintLucas\Migration;

use Rhumsaa\Uuid\Uuid;
use SintLucas\Media;
use SintLucas\School;

class OneToTwo extends Migrator {

	protected $questions;
	protected $filters;
	protected $options;

	public function run()
	{
		$this->migrateLocations();
		$this->migratePrograms();
		$this->migrateQuestions();
		$this->migrateFilters();
		$this->migrateUsersAndProfiles();
	}

	public function migrateLocations()
	{
		$locations = $this->queryOld('school_locations')->get();

		foreach($locations as $location)
		{
			$this->locations[$location->id] = $this->createLocation($location);
		}
	}

	public function createLocation($location)
	{
		return $this->queryNew('school_locations')->insertGetId(array(
			'name' => $location->name
		));
	}

	public function migratePrograms()
	{
		$programs = $this->queryOld('school_programs')
			->join('profile_profiles', 'profile_profiles.program_id', '=', 'school_programs.id')
			->selectRaw('school_programs.*, profile_profiles.location_id')
			->groupBy('profile_profiles.program_id')
			->get();

		foreach($programs as $program)
		{
			$this->createProgram($program);
		}
	}

	public function createProgram($program)
	{
		$type = $this->getProgramType($program->type_id);

		return $this->queryNew('school_programs')->insert(array(
			'location_id' => $this->locations[$program->location_id],
			'type' => $type,
			'name' => $program->name
		));
	}

	public function getProgramType($type)
	{
		return $type == 1 ? School\Type::MBO : School\Type::VMBO;
	}

	public function migrateFilters()
	{
		$filters = $this->queryOld('profile_filters')->get();

		foreach($filters as $filter)
		{
			$this->filters[$filter->id] = $this->createFilter($filter);
		}

		$options = $this->queryOld('profile_filteroptions')->get();

		foreach($options as $option)
		{
			$this->options[$option->id] = $this->createOption($option);
		}
	}

	public function createFilter($filter)
	{
		return $this->queryNew('filter_filters')->insertGetId(array(
			'multiple_choice' => (bool) $filter->multiple_choice,
			'label' => $filter->label
		));
	}

	public function createOption($option)
	{
		return $this->queryNew('filter_options')->insertGetId(array(
			'filter_id' => (int) $this->filters[$option->filter_id],
			'label' => $option->value
		));
	}

	public function migrateQuestions()
	{
		$questions = $this->queryOld('profile_questions')->get();

		foreach($questions as $question)
		{
			$this->questions[$question->id] = $this->createQuestion($question);
		}
	}

	public function createQuestion($question)
	{
		return $this->queryNew('profile_questions')->insertGetId(array(
			'label' => $question->label
		));
	}

	public function migrateUsersAndProfiles()
	{
		$self = $this;
		$this->queryOld('user_users')
			->join('profile_profiles', 'user_users.id', '=', 'profile_profiles.user_id')
			->selectRaw(('profile_profiles.*, user_users.*, profile_profiles.email as profile_email, profile_profiles.id as profile_id'))
			->chunk(50, function($users) use($self)
		{
			foreach($users as $userData)
			{
				if($self->hasProfilePicture($userData->student_id))
				{
					$self->createUserAndProfile($userData);
				}
			}
		});
	}

	public function hasProfilePicture($id)
	{
		$filename = $this->getProfilePictureFilename($id);

		return file_exists($this->getProfilePictureSourcePath($filename));
	}

	public function getProfilePictureFilename($id)
	{
		return "$id.jpg";
	}

	public function getProfilePictureSourcePath($filename)
	{
		return base_path('data/images/'.$filename);
	}

	public function getImageStoragePath($filename)
	{
		return storage_path('images/'.$filename);
	}

	public function createAndMoveProfilePicture($id)
	{
		$filename = $this->getProfilePictureFilename($id);
		$newName  = Uuid::uuid4().'.jpg';

		rename($this->getProfilePictureSourcePath($filename), $this->getImageStoragePath($newName));

		return $this->queryNew('media_images')->insertGetId(array(
			'filename' => $newName
		));
	}

	public function createUserAndProfile($userData)
	{
		$userId = $this->queryNew('user_users')->insertGetId(array(
			'email'          => $userData->email,
			'password'       => $userData->password,
			'remember_token' => $userData->remember_token,
			'first_name'     => $userData->first_name,
			'last_name'      => trim($userData->last_name_prefix . ' ' . $userData->last_name)
		));

		$pictureId = $this->createAndMoveProfilePicture($userData->student_id);

		$profileId = $this->queryNew('profile_profiles')->insertGetId(array(
			'program_id' => $userData->program_id,
			'student_id' => $userData->student_id,
			'user_id'    => $userId,
			'year'       => 2014,
			'email'      => $userData->profile_email,
			'website'    => $userData->website,
			'location'   => $userData->location,
			'quote'      => $userData->quote,
			'status'     => (int) $userData->approved == 1 ? 2 : 0,
			'image_id'   => (int) $pictureId
		));

		$this->createAnswers($userData, $profileId);
		$this->createPortfolioItems($userData, $profileId);
		$this->createSocialMediaAccounts($userData, $profileId);
		$this->createProperties($userData, $profileId);
	}

	public function createAnswers($userData, $profileId)
	{
		$answers = $this->queryOld('profile_answers')
			->where('profile_id', '=', $userData->profile_id)
			->get();

		foreach($answers as $answer)
		{
			$this->queryNew('profile_answers')->insert(array(
				'profile_id' => $profileId,
				'question_id' => $this->questions[$answer->question_id],
				'value' => $answer->value
			));
		}
	}

	public function createProperties($userData, $profileId)
	{
		$properties = $this->queryOld('profile_profileproperty')
			->where('profile_id', '=', $userData->profile_id)
			->get();

		foreach($properties as $property)
		{
			$this->queryNew('profile_properties')->insert(array(
				'profile_id' => $profileId,
				'option_id' => $this->options[$property->option_id]
			));
		}
	}

	public function createPortfolioItems($userData, $profileId)
	{
		$items = $this->queryOld('portfolio_items')
			->join('media_items', 'media_items.linkable_id', '=', 'portfolio_items.id')
			->where('profile_id', '=', $userData->profile_id)
			->selectRaw('portfolio_items.*, media_items.type as media_type, media_items.id as media_id, media_items.value as media_value')
			->get();

		foreach($items as $item)
		{
			$media = $this->createMediaItem($item);
			$this->queryNew('portfolio_items')->insert(array(
				'profile_id' => $profileId,
				'type' => $item->type_id,
				'media_type' => get_class($media),
				'media_id' => $media->id
			));
		}
	}

	public function createMediaItem($item)
	{
		switch($item->media_type)
		{
			case 'image':
				$filename = sprintf('%s.%s',$item->media_id, $item->media_value);

				$model = Media\Image\Image::create(array(
					'filename' => $filename
				));

				break;

			case 'video':

				if(strpos($item->media_value, 'youtube'))
				{
					$type = 'youtube';
				}
				else
				{
					$type = 'vimeo';
				}

				$model = Media\Video\Video::create(array(
					'type' => $type,
					'url'  => $item->media_value
				));

				break;
		}

		return $model;
	}

	public function createSocialMediaAccounts($userData, $profileId)
	{
		$accounts = $this->queryOld('profile_socialmedia')
			->where('profile_id', '=', $userData->profile_id)
			->get();

		foreach($accounts as $account)
		{
			$this->queryNew('profile_socialmedia')->insert(array(
				'profile_id' => $profileId,
				'type'       => $this->getSocialMediaType($account->type_id),
				'username'   => $account->username
			));
		}
	}

	public function getSocialMediaType($id)
	{
		$map = array(
			1 => 'facebook',
			2 => 'twitter',
			3 => 'lastfm',
			4 => 'dribbble',
			5 => 'linkedin',
			6 => 'flickr',
			7 => 'vimeo',
			8 => 'pinterest',
			9 => 'instagram'
		);

		return $map[$id];
	}
}
