<?php

class index_c extends Controller
{
	function index()
	{	
		$this->view->show('index_v.php','layout_v.php');
	}

}
?>