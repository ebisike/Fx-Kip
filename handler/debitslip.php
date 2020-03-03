<?php
	if(isset($_POST['debit'])){
        $today = date('Y-m-d');
        if($_POST['dates'] > $today){
        	#check if selected date is greater than the current date
            echo '<script>alert("'.$_POST['dates'].' is not a valid date. it appears to be a future date\nPlease Enter a new date")</script>';
        }else{
            $account->setExpense($_POST);
        }
    }
?>