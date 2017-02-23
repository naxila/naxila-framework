<?php

class models {
	public static function run() {
		echo "<h3>There is Models control panel!</h3>";
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
			include('forms/_models.php');		
		}
	}

	public static function save() {
		global $models_path;
		global $views_path;
		global $controllers_path;
		
		if (isset($_POST['title'])) {
			$title = $_POST['title'];
			$requires = $_POST['requires'];
			$function = $_POST['function'];
			$f_type = $_POST['f_type'];
			$f_args = $_POST['f_args'];
			$f_static = $_POST['f_static'];

			$dir = $models_path;
			$file = fopen($dir.$title.".php", "w");

			$tab = "	";
			$tabs = "		";

			$code = "<?php";


			foreach ($requires as $r) {
				if ($r!='') $code.="\nrequire_once('".$dir.$r.".php');";
			}

			$code .= "\n\nclass ".$title." extends Model {";

			for ($i=0; $i<count($function); $i++) {
				if ($function[$i]!='') {
					$code.="\n\n".$tab.$f_type[$i]." static function ".$function[$i]."(".$f_args[$i].") {";
					$code.="\n".$tabs."#Your code";
					$code.="\n".$tab."}";
				}
			}

			if (isset($_POST['table_check'])) {
				require_once('database.php');
				database::createTable($_POST);

				$name = $_POST['name'];
				$cname = $_POST['cname'];
				$ctype = $_POST['ctype'];
				$clength = $_POST['clength'];
				$cdefault = $_POST['cdefault'];
				$crule = $_POST['crule'];

				for ($i=0; $i<count($cname); $i++) {
					if ($cname[$i]!='') {
						if ($crule[$i]=='UNIQUE' OR $crule='PRIMARY KEY') {
							$crule[$i] = true;
						}
						else {
							$crule[$i] = false;
						}

						$code.="\n\n".$tab."public static function findBy".ucfirst(strtolower($cname[$i]))."($"."query) {";
						$code.="\n".$tabs."return findBy('$name', '$cname[$i]', $"."query, '$crule[$i]');";
						$code.="\n".$tab."}";
					}

				}

			}

			$code .= "\n\n}";

			fwrite($file, $code);
			fclose($file);

			echo "<div class='fwrk_content-message'>Model Created!</div>";

			
		}

		else {
			echo "<div class='fwrk_content-message'> Nothing to save </div>";
		}
	}
}

?> 