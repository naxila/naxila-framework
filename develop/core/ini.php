<?php

$conf = parse_ini_file("conf.ini");
$models_path = $conf['MODELS_PATH'];
$views_path = $conf['VIEWS_PATH'];
$controllers_path = $conf['CONTROLLERS_PATH'];

$manifest = parse_ini_file("core/manifest.ini");

?>