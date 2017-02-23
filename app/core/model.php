<?php

require_once('DB.php');

class Model
{
	public function get_data()
	{
	}

	public function findBy($table, $column, $query, $unique=false) {
		$result = DB::query("SELECT * FROM $table WHERE $column='$query'");

		if ($result) {
			if ($unique) {
				return $result[0];
			}
			else {
				return $result;
			}
		}
		else {
			return false;
		}

	}
}
?>