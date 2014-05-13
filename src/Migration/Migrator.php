<?php namespace SintLucas\Migration;

use Illuminate\Database\DatabaseManager;

abstract class Migrator {

	protected $db;

	public function __construct(DatabaseManager $db)
	{
		$this->db = $db;
	}

	public function queryOld($table)
	{
		return $this->db->connection('old')->table($table);
	}

	public function queryNew($table)
	{
		return $this->db->connection('main')->table($table);
	}
}
