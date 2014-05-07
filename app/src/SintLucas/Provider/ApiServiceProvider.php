<?php namespace SintLucas\Provider;

use Illuminate\Support\ServiceProvider;
use League\Fractal;
use SintLucas\Api\Controllers as Controllers;
use SintLucas\Api\Transformers as Transformers;
use SintLucas\Core\ParserManager;

class ApiServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerFractal();
		$this->registerTransformers();
		$this->registerControllers();
	}

	/**
	 * Register all fractal transformers.
	 *
	 * @return void
	 */
	public function registerFractal()
	{
		$this->app['league.fractal'] = $this->app->share(function($app)
		{
			$scopes  = explode(',', $app['request']->input('embeds', null));

			$fractal = new Fractal\Manager();
			$fractal->setRequestedScopes($scopes);

			return $fractal;
		});
	}

	/**
	 * Register all fractal transformers.
	 *
	 * @return void
	 */
	public function registerTransformers()
	{
		$this->app['api.transformers.portfolio.item'] = $this->app->share(function($app)
		{
			return new Transformers\Portfolio\ItemTransformer();
		});

		$this->app['api.transformers.portfolio.type'] = $this->app->share(function($app)
		{
			return new Transformers\Portfolio\TypeTransformer();
		});

		$this->app['api.transformers.profile.profile'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\ProfileTransformer(
				$app['api.transformers.profile.answer'],
				$app['api.transformers.school.location'],
				$app['api.transformers.portfolio.item'],
				$app['api.transformers.school.program'],
				$app['api.transformers.profile.property'],
				$app['api.transformers.profile.socialmedia'],
				$app['api.transformers.user.user'],
				$app['api.transformers.school.year']
			);
		});

		$this->app['api.transformers.profile.answer'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\AnswerTransformer();
		});

		$this->app['api.transformers.profile.filter'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\FilterTransformer(
				$app['api.transformers.profile.filteroption']
			);
		});

		$this->app['api.transformers.profile.filteroption'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\FilterOptionTransformer();
		});

		$this->app['api.transformers.profile.property'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\PropertyTransformer();
		});

		$this->app['api.transformers.profile.socialmedia'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\SocialMediaTransformer();
		});

		$this->app['api.transformers.profile.question'] = $this->app->share(function($app)
		{
			return new Transformers\Profile\QuestionTransformer();
		});

		$this->app['api.transformers.school.location'] = $this->app->share(function($app)
		{
			return new Transformers\School\LocationTransformer();
		});

		$this->app['api.transformers.school.program'] = $this->app->share(function($app)
		{
			return new Transformers\School\ProgramTransformer();
		});

		$this->app['api.transformers.school.type'] = $this->app->share(function($app)
		{
			return new Transformers\School\TypeTransformer();
		});

		$this->app['api.transformers.school.year'] = $this->app->share(function($app)
		{
			return new Transformers\School\YearTransformer();
		});

		$this->app['api.transformers.user.role'] = $this->app->share(function($app)
		{
			return new Transformers\User\RoleTransformer();
		});

		$this->app['api.transformers.user.user'] = $this->app->share(function($app)
		{
			return new Transformers\User\UserTransformer();
		});
	}

	/**
	 * Register all api controllers.
	 *
	 * @return void
	 */
	public function registerControllers()
	{
		$this->app['api.controllers.portfolio.item'] = $this->app->share(function($app)
		{
			return new Controllers\Portfolio\ItemController(
				$app['portfolio.repo.item'],
				$app['league.fractal'],
				$app['api.transformers.portfolio.item']
			);
		});

		$this->app['api.controllers.portfolio.type'] = $this->app->share(function($app)
		{
			return new Controllers\Portfolio\TypeController(
				$app['portfolio.repo.type'],
				$app['league.fractal'],
				$app['api.transformers.portfolio.type']
			);
		});

		$this->app['api.controllers.profile'] = $this->app->share(function($app)
		{
			return new Controllers\ProfileController(
				$app['profile.repo.profile'],
				$app['league.fractal'],
				$app['api.transformers.profile.profile']
			);
		});

		$this->app['api.controllers.profile.answer'] = $this->app->share(function($app)
		{
			return new Controllers\Profile\AnswerController(
				$app['profile.repo.answer'],
				$app['league.fractal'],
				$app['api.transformers.profile.answer']
			);
		});

		$this->app['api.controllers.profile.filter'] = $this->app->share(function($app)
		{
			return new Controllers\Profile\FilterController(
				$app['profile.repo.filter'],
				$app['league.fractal'],
				$app['api.transformers.profile.filter']
			);
		});

		$this->app['api.controllers.profile.filteroption'] = $this->app->share(function($app)
		{
			return new Controllers\Profile\FilterController(
				$app['profile.repo.filteroption'],
				$app['league.fractal'],
				$app['api.transformers.profile.filteroption']
			);
		});

		$this->app['api.controllers.profile.property'] = $this->app->share(function($app)
		{
			return new Controllers\Profile\PropertyController(
				$app['profile.repo.property'],
				$app['league.fractal'],
				$app['api.transformers.profile.property']
			);
		});

		$this->app['api.controllers.profile.question'] = $this->app->share(function($app)
		{
			return new Controllers\Profile\QuestionController(
				$app['profile.repo.question'],
				$app['league.fractal'],
				$app['api.transformers.profile.question']
			);
		});

		$this->app['api.controllers.school.location'] = $this->app->share(function($app)
		{
			return new Controllers\School\LocationController(
				$app['school.repo.location'],
				$app['league.fractal'],
				$app['api.transformers.school.location']
			);
		});

		$this->app['api.controllers.school.program'] = $this->app->share(function($app)
		{
			return new Controllers\School\ProgramController(
				$app['school.repo.program'],
				$app['league.fractal'],
				$app['api.transformers.school.program']
			);
		});

		$this->app['api.controllers.school.type'] = $this->app->share(function($app)
		{
			return new Controllers\School\TypeController(
				$app['school.repo.type'],
				$app['league.fractal'],
				$app['api.transformers.school.type']
			);
		});

		$this->app['api.controllers.school.year'] = $this->app->share(function($app)
		{
			return new Controllers\School\YearController(
				$app['school.repo.year'],
				$app['league.fractal'],
				$app['api.transformers.school.year']
			);
		});

		$this->app['api.controllers.user.role'] = $this->app->share(function($app)
		{
			return new Controllers\User\RoleController(
				$app['user.repo.role'],
				$app['league.fractal'],
				$app['api.transformers.user.role']
			);
		});

		$this->app['api.controllers.user.user'] = $this->app->share(function($app)
		{
			return new Controllers\User\UserController(
				$app['user.repo.user'],
				$app['league.fractal'],
				$app['api.transformers.user.user']
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
		return array();
	}

}
