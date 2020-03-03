<?php
	/******************************************************************************************************************************************
    General note:
    KEY:
      1 = DATA MANAGEMENT
      2 = FINANCIAL MANAGEMENT

    $_SESSION['user'] implies which application portal is currently openned.

  *******************************************************************************************************************************************/
    //$_SESSION['user']='';
  if($login->loggedin() && isset($_SESSION['user'])){
    switch ($_SESSION['user']) {
      case '1':
        # Redirect Data management
        header("Location: mData/data_management/landing-pagex/home.php");
        break;
      
      case '2':
        # Redirect Financial Management
        header("Location: finance/home.php");
        break;

      default:
        # code...
        break;
    }
    //echo 'user already loggedin';
  }

  //code to handle login process
  $result = NULL;
  if(isset($_POST['login'])) {
  	$type = $_POST['user_type'];
    //echo md5($pwd);

    if($type==0){
    	$result = 'Please Select an Action';
    }else{
	    if($result = $login->Userlogin($_POST)) {
        $id = $result['id']; 
		    $login->setSessionVariables($id,$type);
		      switch ($_SESSION['user']) {
		        case '1':
		          # code...
		          header("Location: mData/data_management/landing-pagex/home.php");
		        	break;

		        case '2':
		          header("Location: finance/home.php");
		          break;
		        }
	    }else{
        $msg = 'Login Details not Found';
        //$result=$login->Userlogin($_POST);
        #the code above deals with the false part of the function that returns error values.
      }
    }
  }
?>