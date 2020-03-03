<?php

	 
     $r=$login->getLoginInfo();
     $company = $r['company_name'];
     $email = $r['email'];
     $pwd = $r['password'];

    if(isset($_POST['edit'])){
        if($login->editLogin($_POST)){
            $msg = 'Your Data has been succesfully updated';
        }else{
        	$msg = 'The Company name and/or Email you chose, is already in use by another person';
        }
    }

?>