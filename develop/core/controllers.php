<?php

class controllers {
	public static function run() {
		echo "<h3>There is Controllers control panel!</h3>";
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
			include('forms/_controllers.php');		
		}
	}

	public static function save() {
		global $models_path;
		global $views_path;
		global $controllers_path;

		if (isset($_POST['title'])) {
			$title = $_POST['title'];
			$action = $_POST['action'];
			$f_args = $_POST['args'];
			$requires = $_POST['requires'];


			$dir = $controllers_path;
			$file = fopen($dir.$title."_c.php", "w");

			$tab = "	";
			$tabs = "		";

			$code = "<?php";

			if ($_POST['usedb'] == 'true') {
				$code.="\nrequire_once('app/core/DB.php');";
			}

			foreach ($requires as $r) {
				if ($r!='') $code.="\nrequire_once('".$dir.$r.".php');";
			}

			$code .= "\n\nclass ".$title."_c extends Controller {";

			for ($i=0; $i<count($action); $i++) {
				if ($action[$i]!='') {
					$code.="\n\n".$tab."public static function ".$action[$i]."(".$f_args[$i].") {";
					$code.="\n".$tabs."#Your code";
					$code.="\n".$tab."}";
				}
			}

			$code .= "\n\n}";

			fwrite($file, $code);
			fclose($file);

			echo "<div class='fwrk_content-message'>Controller Created!</div>";
		}

		else {
			echo "<div class='fwrk_content-message'> Nothing to save </div>";
		}
	}
}

?>