<?php

// namespace database;

class Db {

	protected $db;

	public function __construct() {

		$config = require 'config.php';

		try {
			$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
		} catch(PDOException $e) {
			print "Error!:".$e->getMessage()."<br>";
			die();
		}
	}

	public function query($sql) {
		$query = $this->db->query($sql);
		return $result = $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
}