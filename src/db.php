<?php
namespace mberatsanli\sqldb;
use \PDO;

class sql{
    private static $dbSettings = array(
		'dbHost' => 'localhost',
		'dbUser' => '',
		'dbPass' => '',
		'dbName' => ''
    );
    
    /**
	 * settings
	 * @param  string $n
	 * @param  array  $set
	 */
	public static function settings(array $set = array())
	{
		if ($set) self::$dbSettings = array_merge(self::$dbSettings, $set);
	}

    /**
	 * DB CONNECTION
	 * @return array $db
	 * @package PDO
     * 
     * @return void
	 */
	private static function db()
	{
		$d = self::$dbSettings;
		try {
			$db = new PDO('mysql:host='.$d['dbHost'].';dbname='.$d['dbName'].';charset=utf8', $d['dbUser'], $d['dbPass']);
		} catch (PDOException $e) {
			echo 'Error: '.$e->getMessage();
		}
		return $db;
	}
}