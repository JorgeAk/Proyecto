<?php

require 'DBConnection.php';

/**
 * Class for execute param querys
 */
class Model {

	private $connection;
	protected $table;
	protected $columns;
	
	function __construct() {
		$this->connection = new DBConnection();
	}

	protected function add($values) {
		# Create query
		$qry = "INSERT INTO $this->table VALUES('".implode("','",$values)."');";

		# Execute
		return $this->connection->query($qry);
	}

	protected function edit($cols, $condition) {
		# Create query
		$qry = "UPDATE $this->table SET ";

		# , flag
		$comma = false;

		# Check columns to change
		foreach ($cols as $key => $value) {
			if(!$comma) {
				$qry .= "$key = '$value' ";
				$comma = true;
			} else {
				$qry .= ", $key = '$value' "; 
			}
		}

		# Add WHERE clause
		$qry .= " WHERE ";

		# AND flag
		$and = false;

		# Check conditions
		foreach ($condition as $key => $value) {
			if(!$and) {
				$qry .= "$key = '$value' ";
				$and = true;
			} else {
				$qry .= "AND $key = '$value' "; 
			}
		}

		# Execute
		return $this->connection->query($qry);
	}

	protected function findAll() {
		# Create query
		$qry = "SELECT * FROM $this->table;";

		# Execute
		return $this->connection->fetch($qry);
	}

	protected function find($cols, $condition) {
		# Create query
		$qry = "SELECT ".(sizeof($cols) > 0 ? implode(',', $cols) : '*')." FROM $this->table ";

		# AND flag
		$and = false;

		# Check conditions
		if (sizeof($condition) > 0) {
			$qry .= " WHERE ";
			foreach ($condition as $key => $value) {
				if(!$and) {
					$qry .= "$key = '$value' ";
					$and = true;
				} else {
					$qry .= "AND $key = '$value' "; 
				}
			}
		}

		# Execute
		return $this->connection->fetch($qry);
	}

	protected function remove($condition) {
		# Create query
		$qry = "DELETE FROM $this->table WHERE ";

		# AND flag
		$and = false;

		# Check conditions
		foreach ($condition as $key => $value) {
			if(!$and) {
				$qry .= "$key = '$value' ";
				$and = true;
			} else {
				$qry .= "AND $key = '$value' "; 
			}
		}

		# Execute
		return $this->connection->query($qry);
	}

}

?>