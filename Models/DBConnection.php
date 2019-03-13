<?php
	
/**
 * Class for connect to MySQL and execute Querys
 */
class DBConnection {

	private $host;
	private $username;
	private $password;
	private $database;
	
	function __construct() {
		# Read config
		$config = json_decode(file_get_contents('./config.info', FILE_USE_INCLUDE_PATH)) or die('Error. Not exists configuration data');

		# Set config
		$this->host = $config->host;
		$this->username = $config->user;
		$this->password = $config->pass;
		$this->database = $config->db;
	}

	private function open() {
		$link = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error connecting to DB');
		return $link;
	}

	private function close($link) {
		return mysqli_close($link);
	}

	public function query($qry) {
		$link = $this->open();

		# Execute
		$result = mysqli_query($link, $qry);

		$this->close($link);

		return $result;
	}

	public function fetch($qry) {
		$link = $this->open();

		# Execute query
		$r = mysqli_query($link, $qry);

		# Prepare result
		$result = array();

		# Fetch
		while( $result[] = mysqli_fetch_array( $r, MYSQLI_ASSOC ) );

		$this->close($link);

		return $result;
	}

}

?>