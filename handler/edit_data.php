<?php

    if(isset($_POST['basic'])){
        $write->setBasicData(2,$_POST,$_SESSION['editId']);
        //header("Location: home.php");
    }

    if(isset($_POST['contact'])){
        if($write->setContactData($_POST,$_SESSION['editId'])){
            header("Location: home.php");
        }
    }

    if(isset($_POST['maritalS'])){
        if($write->setMaritalData($_POST,$_SESSION['editId'])){
            header("Location: home.php");
        }
    }

    if(isset($_POST['social'])){
        if($write->setSocialData($_POST,$_SESSION['editId'])){
            header("Location: home.php");
        }
    }

    if(isset($_POST['churchX'])){
        if($write->setChurchData($_POST,$_SESSION['editId'])){
            header("Location: home.php");
        }
    }

    if(isset($_POST['child'])){
        if($write->setChildData($_POST,$_SESSION['editId'],1)){
            if($_POST['new_child']==1){
                header("Location: edit_data.php?num=6");
            }else{
                header("Location: edit_data.php");
            }
        }
    }

?>