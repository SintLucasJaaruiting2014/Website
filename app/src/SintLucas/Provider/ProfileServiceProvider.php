<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use SintLucas\Domain\Profile\Models\Answer;
use SintLucas\Domain\Profile\Models\FilterOption;
use SintLucas\Domain\Profile\Models\Filter;
use SintLucas\Domain\Profile\Models\Profile;
use SintLucas\Domain\Profile\Models\ProfileProperty;
use SintLucas\Domain\Profile\Models\Question;
use SintLucas\Domain\Profile\Models\SocialMedia;
use SintLucas\Domain\Profile\Models\SocialMediaType;
use SintLucas\Domain\Profile\Repos\AnswerRepo;
use SintLucas\Domain\Profile\Repos\FilterOptionRepo;
use SintLucas\Domain\Profile\Repos\FilterRepo;
use SintLucas\Domain\Profile\Repos\ProfileRepo;
use SintLucas\Domain\Profile\Repos\ProfilePropertyRepo;
use SintLucas\Domain\Profile\Repos\QuestionRepo;
use SintLucas\Domain\Profile\Repos\SocialMediaRepo;
use SintLucas\Domain\Profile\Repos\SocialMediaTypeRepo;
use SintLucas\Domain\Profile\ProfileService;

class ProfileServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['profile.repo.answer'] = $this->app->share(function($app)
		{
			return new AnswerRepo(new Answer);
		});

		$this->app['profile.repo.filteroption'] = $this->app->share(function($app)
		{
			return new FilterOptionRepo(new FilterOption);
		});

		$this->app['profile.repo.filter'] = $this->app->share(function($app)
		{
			return new FilterRepo(new Filter);
		});

		$this->app['profile.repo.profile'] = $this->app->share(function($app)
		{
			return new ProfileRepo(new Profile);
		});

		$this->app['profile.repo.profileproperty'] = $this->app->share(function($app)
		{
			return new ProfilePropertyRepo(new ProfileProperty);
		});

		$this->app['profile.repo.question'] = $this->app->share(function($app)
		{
			return new QuestionRepo(new Question);
		});

		$this->app['profile.repo.socialmedia'] = $this->app->share(function($app)
		{
			return new SocialMediaRepo(new SocialMedia);
		});

		$this->app['profile.repo.socialmediatype'] = $this->app->share(function($app)
		{
			return new SocialMediaTypeRepo(new SocialMediaType);
		});

		$this->app['profile.service'] = $this->app->share(function($app)
		{
			return new ProfileService(
				$app['profile.repo.answer'],
				$app['profile.repo.filteroption'],
				$app['profile.repo.filter'],
				$app['profile.repo.profile'],
				$app['profile.repo.profileproperty'],
				$app['profile.repo.question'],
				$app['profile.repo.socialmedia'],
				$app['profile.repo.socialmediatype']
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'profile.repo.answer',
			'profile.repo.filteroption',
			'profile.repo.filter',
			'profile.repo.profile',
			'profile.repo.profileproperty',
			'profile.repo.question',
			'profile.repo.socialmedia',
			'profile.repo.socialmediatype',
			'profile.service'
		);
	}

}
