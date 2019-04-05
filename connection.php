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
