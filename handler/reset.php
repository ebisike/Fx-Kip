<?php

	 
     //$r=$login->getLoginInfo();

    if(isset($_POST['reset'])){
        if($login->resetPassword($_POST)){
            $msg = 'Your Data has been succesfully updated';
        }else{
        	$msg = 'The Company name and/or Email you chose, is already in use by another person';
        }
    }

?>