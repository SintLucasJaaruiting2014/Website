<?php namespace SintLucas\Importer;

use Illuminate\Console\Command;
use SintLucas\Importer\Importer;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImporterCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'importer:import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Start an import by config key.';

	/**
	 * Importer instance.
	 *
	 * @var \SintLucas\Importer\Importer
	 */
	protected $importer;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Importer $importer)
	{
		$this->importer = $importer;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$key = $this->argument('key');
		$this->importer->import($key);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('key', InputArgument::REQUIRED, 'The key of the import config.'),
		);
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
