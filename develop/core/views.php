<?php

class views {
	public static function run() {
		echo "<h3>There is Views control panel!</h3>";
		if (isset($_GET['action'])) {
			$action = $_GET['action'];

			if ($action=='save') {
				self::save();
			}

			else {
				echo "<div class='fwrk_content-message'>Incorrect action</div>";
			}
		}
		else {
			include('forms/_views.php');		
		}
	}

	public static function save() {
		global $models_path;
		global $views_path;
		global $controllers_path;

		if (isset($_POST['title'])) {
			$title = $_POST['title'];

			$dir = $views_path;
			$file = fopen($dir.$title."_v.php", "w");

			$code = "This is '".$title."' view!";

			fwrite($file, $code);
			fclose($file);

			echo "<div class='fwrk_content-message'>View Created!</div>";
		}

		else {
			echo "<div class='fwrk_content-message'> Nothing to save </div>";
		}
	}
}

?>