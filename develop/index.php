<?php 
include('core/ini.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $manifest['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="style/styles.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body> <div class="content">
	<h1><a href='/develop'><img src="style/home.png"> <?= $manifest['title'] ?></a></h1>

	<div class='fwrk_topbar'>
		<a href="/develop"> Home</a>
		<a href="?select=models">Models</a>
		<a href="?select=views">Views</a>
		<a href="?select=controllers">Controllers</a>
		<a href="?select=database">Database</a>
		<a href="?select=common">Common</a>
	</div>

	<div class='fwrk_content'>

		<?php
			require_once ('core/models.php');
			require_once ('core/views.php');
			require_once ('core/controllers.php');
			require_once ('core/database.php');
			require_once ('core/common.php');

			if (isset($_GET['select'])){
				$select = $_GET['select'];

				if ($select=='models') {
					models::run();
				}

				else if ($select=='views') {
					views::run();
				}

				else if ($select=='controllers') {
					controllers::run();
				}

				else if ($select=='database') {
					database::run();
				}

				else if ($select=='common') {
					common::run();
				}

				else if ($select=='about') {
					include('docs/about.php');
				}

				else if ($select=='contacts') {
					include('docs/contacts.php');
				}

				else {
					echo "<div class='fwrk_content-message'> Selection named $select doesn't exist.</div>";
				}
			}

			else {
				echo "<div class='fwrk_content-message'> Select selection in menu at the top </div>";
			}
		?>
	</div>

	<div class="fwrk-footer">
		<div class="fwrk-footer-inner">
			© <?= $manifest['copyright'] ?><br>
			<div class="fwrk-footer-links">
			<a href="?select=about">About</a> 
			<a href="?select=contacts">Contacts</a> 
			<a href="https://github.com/naxila/naxila-framework">GitHub</a><br>
			v. <?= $manifest['version'] ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>

