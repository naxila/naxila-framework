<?php

class database {
	public static function run() {
		echo "<h3>There is Database control panel!</h3>";
		echo "<div class='fwrk_content-message'>Sorry, this module in process ¯\_(ツ)_/¯</div>";

	}

	public static function createTable($data) {
		require_once('../app/core/DB.php');
		$name = $data['name'];
		$cname = $data['cname'];
		$ctype = $data['ctype'];
		$clength = $data['clength'];
		$cdefault = $data['cdefault'];
		$crule = $data['crule'];

		$query = "CREATE TABLE ".$name." (";

		if($name!="") {
			for ($i=0; $i<count($cname); $i++) {
				if ($cname[$i]!="") {
					if ($clength[$i] != "") {
						$clength[$i] = "(".$clength[$i].")";
					}
					if ($cdefault[$i] != "") {
						if ($ctype[$i]=='TIMESTAMP'){
							$cdefault[$i] = "DEFAULT ".$cdefault[$i];
						}
						else {
							$cdefault[$i] = "DEFAULT '".$cdefault[$i]."'";
						}
					}

					if ($i==0) {
						$query.=$cname[$i]." ".$ctype[$i].$clength[$i]." ".$crule[$i]." ".$cdefault[$i];
					}
					else {
						$query.=", ".$cname[$i]." ".$ctype[$i].$clength[$i]." ".$crule[$i]." ".$cdefault[$i];
					}
				}
			}

			$query.=")";
			DB::query($query);
			echo $query;
			echo "<div class='fwrk_content-message'>Table created!</div>";
		}
	}

}

?>