<?php

class common {

	public static function run() {
		global $models_path;
		global $views_path;
		global $controllers_path;

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
			echo "<h3>Naxfram configurations</h3>";
			include('forms/_common.php');
		}
	}

	public static function save() {
		if (count($_POST)==0) {
			echo "<div class='fwrk_content-message'> Nothing to save </div>";
		}

		else {
			$mp = $_POST['mp'];
			$vp = $_POST['vp'];
			$cp = $_POST['cp'];

			$file = fopen('conf.ini', 'w');
			$data = "MODELS_PATH='".$mp."'\n";
			$data .= "VIEWS_PATH='".$vp."'\n";
			$data .= "CONTROLLERS_PATH='".$cp."'\n";

			fwrite($file, $data);
			fclose($file);

			echo "<div class='fwrk_content-message'> All changes saved! </div>";
		}
	}

}