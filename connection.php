<?php


class Database {

	static $connection = null;

	public static function getConnection() {

		if(!empty(static::$connection))
			return static::$connection;

		$host = '127.0.0.1';
		$db   = 'nerdluv';
		$user = 'root';
		$pass = '';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];