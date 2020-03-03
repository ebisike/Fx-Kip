<?php
include '../../mData/class/init.php';

	if(isset($_POST['hit'])){
		echo $_POST['val'].'<br>'.$_POST['text'];
		//echo $_POST['text'];
	}
	$account->test();
?>
<form action="test.php" method="post">
	<input list="val" name="val" required>
	<datalist id="val">
		<option value="one">
		<option value="two">
		<option value="three">
		<option value="seven">
	</datalist>
	<textarea rows="3" cols="3" name="text"></textarea>
	<input type="submit" name="hit">
</form>