<?php
$num = '';
    if(isset($_GET['num'])){
        $num = $_GET['num'];
    }

    if(isset($_POST['next1'])){
        if($result = $write->setBasicData(1,$_POST,0)){
            $ref_id = $result['id'];
            $_SESSION['ref_id'] = $ref_id;
            header("Location: form.php?num=2");
        }
    }
    if(isset($_POST['next2'])){
        if($write->setContactData($_POST,$_SESSION['ref_id'])){
            header("Location: form.php?num=3");
        }
    }
    if(isset($_POST['next3'])){
        if($write->setMaritalData($_POST,$_SESSION['ref_id'])){
            header("Location: form.php?num=6");
        }
    }
    if(isset($_POST['next4'])){
        if($write->setSocialData($_POST,$_SESSION['ref_id'])){
            header("Location: form.php?num=5");
        }
    }
    if(isset($_POST['next5'])){
        if($write->setChurchData($_POST,$_SESSION['ref_id'])){
            echo "<script>alert('You have successfully submitted all data')</script>";
        }
    }
    if(isset($_POST['next6'])){
        if($write->setChildData($_POST,$_SESSION['ref_id'],1)){
            if($_POST['new_child']==1){
                header("Location: form.php?num=6");
            }else{
                header("Location: form.php?num=4");
            }
        }
    }

    #code to handle the back button
    if(isset($_GET['back'])){
        $num = $_GET['back'];
        --$num;
    }

    #AJAX CODE

?>