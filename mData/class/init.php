<?php
	ob_start();
	session_start();
	include 'login.php';
	include 'Write2DB.php';
	include 'Actions.php';
	include 'FetchData.php';
	include 'account.php';
	//include 'createTables.php';

	$login = new Login();
	$write = new Write2DB();
	$action = new Actions();
	$fetch = new FetchData();
	$account = new account();
	//$tables = new createTables();
?>