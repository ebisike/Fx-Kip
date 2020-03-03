<?php
    //Generate statement of account
    if(isset($_POST['generate'])){
        $today = date('Y-m-d');
        $startDate  = $_POST['s_date'];
        $endDate = $_POST['e_date'];

        if($startDate > $endDate){
           echo "<script>alert('Sorry the end date appears to be lesser than the start date')</script>";
        }else{
            $open_bal = $account->statement_facts($_POST);
            //$x = $account->expenditureStatement($startDate,$endDate,$open_bal);
        }
    }
?>