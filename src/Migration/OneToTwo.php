<?php namespace SintLucas\Migration;

use SintLucas\Media;
use SintLucas\School;

class OneToTwo extends Migrator {

	public function run()
	{
		$this->migratePrograms();
		$this->migrateQuestions();
		$this->migrateUsersAndProfiles();
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
		$type = $this->getProgramType($program->type_id, $program->location_id);

		return $this->queryNew('school_programs')->insert(array(
			'type_id' => $type,
			'name' => $program->name
		));
	}

	public function getProgramType($type, $location)
	{
		if($type == 2)
		{
			return School\Type::VMBO;
		}

		if($location == 1)
		{
			return School\Type::MBO_BOX;
		}

		return School\Type::MBO_EHV;
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
				$self->createUserAndProfile($userData);
			}
		});
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

		$profileId = $this->queryNew('profile_profiles')->insertGetId(array(
			'program_id' => $userData->program_id,
			'student_id' => $userData->student_id,
			'user_id'    => $userId,
			'year'       => 2014,
			'email'      => $userData->profile_email,
			'website'    => $userData->website,
			'location'   => $userData->location,
			'quote'      => $userData->quote,
			'status'     => (int) $userData->approved == 1 ? 2 : 0
		));

		$this->createAnswers($userData, $profileId);
		$this->createPortfolioItem($userData, $profileId);
		$this->createSocialMedia($userData, $profileId);
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

	public function createPortfolioItem($userData, $profileId)
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

				$model = Media\Image::create(array(
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

				$model = Media\Video::create(array(
					'type' => $type,
					'url'  => $item->media_value
				));

				break;
		}

		return $model;
	}

	public function createSocialMedia($userData, $profileId)
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
