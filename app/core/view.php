<?php
class View
{
	
	function show($content_view, $template_view = 'layout_v.php', $data = null)
	{
		/*
		if(is_array($data)) {
			extract($data);
		}*/
		//print_r($data);
		include 'app/views/'.$template_view;
	}
}
?>