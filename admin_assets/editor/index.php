
	<?php
	if(!empty($_POST['address'])){
		echo $_POST['address'];
	}
	?>
	<script src="../ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">

		<form method="post">
			<textarea id="editor" name="address"></textarea>
		</textarea>
		<input type="submit" value="Submit"/>
	</form>
<script>
	initSample();
</script>

</body>
</html>
