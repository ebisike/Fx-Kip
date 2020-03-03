<?php
require 'DB.php';

/**
 * 
 */
class Login extends DB
{
	
	public function Userlogin($value) {
		//the following code handles the login script for both Data management and financial management
		$email = $value['email'];
		$pwd = md5($value['pwd']);

		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pwd'";
		$stmt = DB::DBInstance()->query($sql);

		if($stmt->ifExist()>0){
			$result = $stmt->getResults();
			if($pwd == $result['password']){
				return $result;
			}else{
				$msg = 'Password incorrect. Be advised that passwords are cAsE SeNsItIvE';
				return false;
			}
		}else{
			$msg = 'Login Details not Found';
			return false;
		}
	}

	public function loggedin(){
		if(isset($_SESSION['id'])){
			return true;
		}else{
			return false;
		}
	}

	public function checkIfLogin(){
		if(isset($_SESSION['id'])){
			return true;
		}else{
			header("Location: /fx-kip/index.php");
		}
	}

	public function checkTimeOut(){
		$time = time();
		$set_time =  time() + 500000000;
		if(empty($_SESSION['setTime']) || !isset($_SESSION['setTime'])){
			$_SESSION['setTime'] = $set_time;
		}

		if($time>=(int)$_SESSION['setTime']){
	        $_SESSION['id'] = '';
	        session_destroy();
	        return true;
	    }
	}

	public function setSessionVariables($id,$user) {
		$_SESSION['id'] = $id;
		$_SESSION['user'] = $user;
		return true;
	}

	public function getLoginInfo(){
		$sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
		$stmt = DB::DBInstance()->query($sql);
		if($stmt){
			$result=$stmt->getResults();
			return $result;
		}
	}

	public function editLogin($value){
		$comp_name = $this->validateForm($value['comp_name']);
		$email = $this->validateForm($value['email']);
		$pwd = md5($this->validateForm($value['pwd']));

		#check if company name and or email is already in use
		$sql = "SELECT * FROM users WHERE company_name='$comp_name' OR email='$email'";
		$stmt = DB::DBInstance()->query($sql);
		if($stmt->ifExist()>0){
			return false;
		}else{
			$sql = "UPDATE users SET company_name='$comp_name', password='$pwd', email='$email' WHERE id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				return true;
			}
		}
	}

	public function resetPassword($value){
		$email = $this->validateForm($value['email']);
		$pwd = md5($this->validateForm($value['pwd']));

		$sql = $sql = "UPDATE users SET password='$pwd' WHERE email='".$email."'";
		$runsql = DB::DBInstance()->query($sql);
		if($runsql){
			echo "<scrip>alert('Your password has been changed successfully\n Try and login again.')</script>";
		}else{
			echo "Email not valid";
		}

	}

	public function validateForm($data){
			$data = trim($data);
			$data = addslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
}
?>