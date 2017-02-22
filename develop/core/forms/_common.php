<div class='fwrk_content-inner'>
	<form action="?select=common&action=save" method="post">
		<label>Models path</label><br>
		<input type="text" name="mp" autocomplete="off" value="<?= $models_path ?>"><p>

		<label>Views path</label><br>
		<input type="text" name="vp" autocomplete="off" value="<?= $views_path ?>"><p>

		<label>Controllers path</label><br>
		<input type="text" name="cp" autocomplete="off" value="<?= $controllers_path ?>"><p>

		<input type="submit" value="Save">
	</form>
</div>