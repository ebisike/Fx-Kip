<?php
		include('../mData/class/init.php');

		if(isset($_GET['switch'])){
			echo 'current user '.$_GET['switch'] .'<br>';
			$currentUI = $_GET['switch'];
			if($currentUI == 1){
				#reasign $_SESSION['user'] i.e CURRENT USER SESSION.
				$_SESSION['user'] = 2;
				echo $_SESSION['user'] .' is the new user session';
				header("Location: ../finance/pages/home.php");
			}
			elseif($currentUI == 2){
				$_SESSION['user'] = 1;
				header("Location: ../mData/data_management/landing-pagex/pages/home.php");
			}
		}
?>