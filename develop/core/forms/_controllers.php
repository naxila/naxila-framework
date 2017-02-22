<script type="text/javascript">
	function AddAction() {
		$("#actions").append('<label>Action name</label><br><input type="text" name="action[]" autocomplete="off"><br><input type="text" name="args[]" autocomplete="off" placeholder="Arguments ($id, $title, etc.)"><p>');
	}

	function addModel() {
		$('#requires').append("<p><label>Use model</label><br><input type='text' name='requires[]' autocomplete='off' placeholder='Model name'></br>");
	}
</script>

<div class='fwrk_content-inner'>
	<form action="?select=controllers&action=save" method="post">
		<label>Name</label><br>
		<input type="text" name="title" autocomplete="off"><p>

		<p>Use Database <br>
		Yes <input type="radio" name="usedb" value="true"><br>
		No <input type="radio" name="usedb" value="false" checked><br>


		<div id='requires'>
			<label>Use model</label><br>
			<input type="text" name="requires[]" autocomplete="off" placeholder="Model name"></br>
		</div>
		<button onclick="addModel(); return false;">Add model</button><p>

		<div id='actions'>

			<label>Action name</label><br>
			<input type="text" name="action[]" autocomplete="off" value="index"><br>
			<input type="text" name="args[]" autocomplete="off" placeholder="Arguments ($id, $title, etc.)"><p>

			<label>Action name</label><br>
			<input type="text" name="action[]" autocomplete="off" value="save"><br>
			<input type="text" name="args[]" autocomplete="off" placeholder="Arguments ($id, $title, etc.)"><p>

			<label>Action name</label><br>
			<input type="text" name="action[]" autocomplete="off" value="show"><br>
			<input type="text" name="args[]" autocomplete="off" placeholder="Arguments ($id, $title, etc.)" value='$id'><p>

		</div>
		<button onclick="AddAction(); return false;">Add action</button></p>

		<input type="submit" value="Create">

	</form>
</div>