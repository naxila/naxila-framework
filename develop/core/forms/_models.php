<script type="text/javascript">
	function addModel() {
		$('#requires').append("<p><label>Use model</label><br><input type='text' name='requires[]' autocomplete='off' placeholder='Model name'></br>");
	}

	function addFunction() {
		$('.fwrk_functions').append('<div class="fwrk_functions-inner"><label>Name</label><br/><input type="text" name="function[]" autocomplete="off"><select name="f_type[]"><option value="public">public</option><option value="privat">privat</option><option value="protected">protected</option></select><br><input type="text" name="f_args[]" autocomplete="off" placeholder="Arguments ($id, $name etc.) "><br><label style="font-size: 14px;">Static</label> <input type="checkbox" name="f_static[]"></div><p>');
	}

	function AddColumn() {
		$('#tables').append('New column<br> <input type="text" name="cname[]" autocomplete="off"  placeholder="Column name"><select name="ctype[]"><option value="INTEGER">INTEGER</option><option value="VARCHAR">VARCHAR</option><option value="TEXT">TEXT</option><option value="DATE">DATE</option><option value="TIMESTAMP">TIMESTAMP</option></select><input type="text" name="clength[]"  autocomplete="off" placeholder="Column length"> <input type="text" name="cdefault[]" autocomplete="off"  placeholder="Default"> <select name="crule[]"> <option value="">Select rule</option> <option value="UNIQUE">UNIQUE</option> <option value="PRIMARY KEY">PRIMARY KEY</option> </select><p>');
	}

	var n=0;
	function CreateTables() {
		
		if (n==1) {
			n=0;
			$('#tables-cover').html('');
		}

		else {
			n=1;
			$('#tables-cover').html('<div id="tables"> Table name<br> <input type="text" name="name" autocomplete="off"  placeholder="New table name"> <p> New column<br> <input type="text" name="cname[]" value="id"  autocomplete="off" placeholder="Column name"><select name="ctype[]"><option value="INTEGER">INTEGER</option><option value="VARCHAR">VARCHAR</option><option value="TEXT">TEXT</option><option value="DATE">DATE</option><option value="TIMESTAMP">TIMESTAMP</option></select><input type="text" name="clength[]" autocomplete="off"  placeholder="Column length" value="11"> <input type="text" autocomplete="off"  name="cdefault[]" placeholder="Default"> <select name="crule[]"> <option value="">Select rule</option> <option value="UNIQUE">UNIQUE</option> <option value="PRIMARY KEY" selected>PRIMARY KEY</option> </select><p>       New column<br> <input type="text" autocomplete="off"  name="cname[]" placeholder="Column name"><select name="ctype[]"><option value="INTEGER">INTEGER</option><option value="VARCHAR">VARCHAR</option><option value="TEXT">TEXT</option><option value="DATE">DATE</option><option value="TIMESTAMP">TIMESTAMP</option></select><input type="text" name="clength[]" placeholder="Column length" autocomplete="off" > <input type="text" autocomplete="off"  name="cdefault[]" placeholder="Default"> <select name="crule[]"> <option value="">Select rule</option> <option value="UNIQUE">UNIQUE</option> <option value="PRIMARY KEY">PRIMARY KEY</option> </select><p></div> <button onclick="AddColumn(); return false;">Add column</button>');
		}
	}

</script>


<div class='fwrk_content-inner'>
	<form action="?select=models&action=save" method="post">
		<label>Name</label><br>
		<input type="text" name="title" autocomplete="off" placeholder="New model's name"><br>
		<label style="font-size: 14px;">Create tables</label> <input type="checkbox" name='table_check' id='table_check' onclick="CreateTables();"><br> <p>
		
		<div id='tables-cover'>
			
		</div>

		<p>Use Database <br>
		Yes <input type="radio" name="usedb" value="true"><br>
		No <input type="radio" name="usedb" value="false" checked><br>


		<div id='requires'>
			<label>Use model</label><br>
			<input type="text" name="requires[]" autocomplete="off" placeholder="Model name"></br>
		</div>

		

		<button onclick="addModel(); return false;">Add model</button><p>
		

		<div class="fwrk_functions">
			<h3>Functions</h3>

			<div class="fwrk_functions-inner">
				<label>Name</label><br/>
				<input type="text" name='function[]' autocomplete="off" value="create">

				<select name="f_type[]">
					<option value="public">public</option>
					<option value="privat">privat</option>
					<option value="protected">protected</option>
				</select><br>
				<input type="text" name='f_args[]' autocomplete="off" placeholder="Arguments ($id, $name etc.)" value="$data"><br>
				<label style="font-size: 14px;">Static</label> <input type="checkbox" name='f_static[]' checked>
			</div><p>

			<div class="fwrk_functions-inner">
				<label>Name</label><br/>
				<input type="text" name='function[]' autocomplete="off" value="update">

				<select name="f_type[]">
					<option value="public">public</option>
					<option value="privat">privat</option>
					<option value="protected">protected</option>
				</select><br>
				<input type="text" name='f_args[]' autocomplete="off" placeholder="Arguments ($id, $name etc.)" value="$id, $data"><br>
				<label style="font-size: 14px;">Static</label> <input type="checkbox" name='f_static[]'>
			</div><p>

			<div class="fwrk_functions-inner">
				<label>Name</label><br/>
				<input type="text" name='function[]' autocomplete="off" value="delete">

				<select name="f_type[]">
					<option value="public">public</option>
					<option value="privat">privat</option>
					<option value="protected">protected</option>
				</select><br>
				<input type="text" name='f_args[]' autocomplete="off" placeholder="Arguments ($id, $name etc.)" value="$id"><br>
				<label style="font-size: 14px;">Static</label> <input type="checkbox" name='f_static[]'>
			</div><p>

		</div>
		<button onclick="addFunction(); return false;">Add function</button><p>

		<input type="submit" value='Create'>
	</form>
</div>