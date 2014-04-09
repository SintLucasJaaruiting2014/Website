<?php namespace SintLucas\Importer;

use Illuminate\Support\Facades\File;
use SintLucas\Core\ParserManager;

class Importer {

	/**
	 * The application instance.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;

	/**
	 * Importer config.
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * Parser manager instance.
	 *
	 * @var \SintLucas\Core\ParserManager
	 */
	protected $parserManager;

	/**
	 * Create a new importer instance.
	 *
	 * @param \Illuminate\Foundation\Application $app
	 * @param \SintLucas\Core\ParserManager      $parserManager
	 * @param array                              $config
	 */
	public function __construct($app, ParserManager $parserManager, $config = array())
	{
		$this->app           = $app;
		$this->parserManager = $parserManager;
		$this->config        = $config;
	}

	/**
	 * Initiate an import by key.
	 *
	 * @param  string $key
	 * @return
	 */
	public function import($key)
	{
		if($config = $this->getConfig($key))
		{
			$parser = $this->getParser($config['type']);
			$source = $this->getSource($config['path']);

			$data = $parser->parse($source);

			$this->seed($config['seeder'], $data);
		}
	}

	/**
	 * Seed the database with the parsed data.
	 *
	 * @param  \Illuminate\Database\Seeder $seeder
	 * @param  array                       $data
	 * @return void
	 */
	public function seed($seeder, $data)
	{
		$seeder = new $seeder($this->app, $data);
		$seeder->run();
	}

	/**
	 * Get a config by key.
	 *
	 * @param  string $key
	 * @return array|null
	 */
	protected function getConfig($key)
	{
		return array_get($this->config, $key);
	}

	/**
	 * Get the parser for the given type.
	 *
	 * @param  string $type
	 * @return \SintLucas\Core\Parsers\ParserInterface
	 */
	protected function getParser($type)
	{
		return $this->parserManager->driver($type);
	}

	/**
	 * Get the source data for the import.
	 *
	 * @param  string $path
	 * @return string
	 */
	protected function getSource($path)
	{
		return File::get($path);
	}

}
