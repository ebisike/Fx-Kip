<?php
	include '../../../class/init.php';
	
	if(isset($_POST['next1'])){
        if($result = $write->setBasicData($_POST)){
            $ref_id = $result['id'];
            echo $result['id'];
            echo "<script>alert('You have successfully submitted this data')</script>";
        }
    }
    if(isset($_POST['next2'])){
        echo "string";
        if($write->setContactData($_POST)){
            echo "<script>alert('You have successfully submitted this data')</script>";
        }
    }
    if(isset($_POST['next3'])){
        if($write->setMaritalData($_POST)){
            echo "<script>alert('You have successfully submitted this data')</script>";
        }
    }
    if(isset($_POST['next4'])){
        if($write->setSocialData($_POST)){
            echo "<script>alert('You have successfully submitted this data')</script>";
        }
    }
    if(isset($_POST['next5'])){
        if($write->setChurchData($_POST)){
            echo "<script>alert('You have successfully submitted all data')</script>";
        }
    }
?>