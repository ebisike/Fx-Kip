<?php
	
	$msg = NULL;

	if(isset($_POST['register'])){
		if($_POST['pwd'] == $_POST['cpwd']){
			$msg = $action->register($_POST);
		}else{
			$msg = 'Password do not match';
		}
	}
?>