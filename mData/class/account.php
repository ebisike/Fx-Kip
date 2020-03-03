<?php
	/**
	 * 
	 */
	class Account extends DB
	{

		public function getBalance(){
			$sql = "SELECT * FROM balance WHERE company_id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$result = $stmt->getResults();
				return $result;
			}
		}

		public function setBalance($amt,$type){
			//first get the last balance update
			$prev_balance = $this->getBalance();
			switch ($type) {
				case '1':
					#Credit your account
					$amt = $prev_balance['balance'] + $amt;
					//update new Balance
					$sql = "UPDATE balance SET balance='$amt' WHERE company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}else{
						return false;
					}
					break;
				case '2':
					#Debit your account
					$amt = $prev_balance['balance'] - $amt;
					//update new Balance
					$sql = "UPDATE balance SET balance='$amt' WHERE company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}else{
						return false;
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function setIncome($values){
			$income_src = strtoupper($this->validateData($values['income']));
			$amount = $this->validateData($values['amount']);
			$date = $values['dates'];
			$desc = $this->validateData($values['desc']);
			$today = date('d-M-Y');

			$sql = "INSERT INTO income (income_source,description,amount,credit_date,dates,company_id) VALUES ('$income_src','$desc','$amount','$date','$today','".$_SESSION['id']."')";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$this->setBalance($amount,1);
				echo '<script>alert("You have successfully deposited <span>&#8358</span>'.$amount.'.00 to your account")</script>';
				return true;
			}else{
				echo 'failed to deposit'.$stmt;
			}
		}

		public function setExpense($values){
			$expense_src = strtoupper($this->validateData($values['expense']));
			$amount = $this->validateData($values['amount']);
			$date = $values['dates'];
			$desc = $this->validateData($values['desc']);
			$today = date('d-M-Y');

			$sql = "INSERT INTO expense (expense_source,description,amount,expense_date,dates,company_id) VALUES ('$expense_src','$desc','$amount','$date','$today','".$_SESSION['id']."')";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$this->setBalance($amount,2);
				echo '<script>alert("<span>&#8358</span>'.$amount.'.00 has been deducted from your account")</script>';
				return true;
			}else{
				echo "Faileld to debit".'<br>'. var_dump($sql);
			}
		}

		public function accountStatement($values){
			$startDate = $values['s_date'];
			$endDate = $values['e_date'];
			
			//get Income Satement and the expenditure statement from the method incomeStatement() and expenditureStatemnet() respectively
			if($incomeStatement = $this->incomeStatement($startDate,$endDate) && $expenditureStatement = expenditureStatement($startDate,$endDate)){
				#do something
			}
		}

		public function incomeStatement($startDate,$endDate,$bal){
			$timstamp = strtotime($startDate);
			$startDay = date("d", $timstamp);
			$startMonth = date("m", $timstamp);
			$startYear = date("Y", $timstamp);
			$timstamp2 = strtotime($endDate);
			$endDay = date("d",$timstamp2);
			$endMonth = date("m",$timstamp2);
			$endYear = date("Y", $timstamp2);
			$count = 0;
			$sql = "SELECT * FROM income WHERE DAY(credit_date) BETWEEN $startDay AND $endDay AND MONTH(credit_date) BETWEEN  $startMonth AND $endMonth AND YEAR(credit_date) BETWEEN $startYear AND $endYear AND company_id = '".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt->ifExist()>0){
				while($result=$stmt->getResults()){
					/************************************
					create a time stamp for the expense date
					****************************************/
					$timestamp = strtotime($result['credit_date']);
					$day = date("d", $timestamp);
					$Day = date("D", $timestamp);
					$month = date("M", $timestamp);
					$year = date("Y", $timestamp);
					$credit_date = $Day." ".$day.", ".$month." ".$year;
					/***************************************
					create a time stamp for the value date
					****************************************/
					$timestamp1 = strtotime($result['dates']);
					$day1 = date("d", $timestamp1);
					$Day1 = date("D", $timestamp1);
					$month1 = date("M", $timestamp1);
					$year1 = date("Y", $timestamp1);
					$value_date = $Day1." ".$day1.", ".$month1." ".$year1;
					$balance = $result['amount'] + $bal;
					echo '
							<tr>
								<td>'.++$count.'</td>
								<td><span>&#8358</span> '.$result['amount'].'</td>
								<td>'.$credit_date.'</td>
								<td>'.$value_date.'</td>
								<td>'.$result['income_source'].'</td>
								<td>'.$result['description'].'</td>
								<td><span>&#8358</span> '.$balance.'</td>
							</tr>
						';
				}
			}else{
				echo "No data found";
			}
			//return false;
		}

		public function expenditureStatement($startDate,$endDate,$bal){
			$timstamp = strtotime($startDate);
			$startDay = date("d", $timstamp);
			$startMonth = date("m", $timstamp);
			$startYear = date("Y", $timstamp);

			$timstamp2 = strtotime($endDate);
			$endDay = date("d",$timstamp2);
			$endMonth = date("m",$timstamp2);
			$endYear = date("Y", $timstamp2);
			$count = 0;
			$sql = "SELECT * FROM expense WHERE DAY(expense_date) BETWEEN $startDay AND $endDay AND MONTH(expense_date) BETWEEN  $startMonth AND $endMonth AND YEAR(expense_date) BETWEEN $startYear AND $endYear AND company_id = '".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				// var_dump($stmt);
				while($result=$stmt->getResults()){
					/************************************
					create a time stamp for the expense date
					****************************************/
					$timestamp = strtotime($result['expense_date']);
					$day = date("d", $timestamp);
					$Day = date("D", $timestamp);
					$month = date("M", $timestamp);
					$year = date("Y", $timestamp);
					$expense_date = $Day." ".$day.", ".$month.$year;
					/***************************************
					create a time stamp for the value date
					****************************************/
					$timestamp1 = strtotime($result['dates']);
					$day1 = date("d", $timestamp1);
					$Day1 = date("D", $timestamp1);
					$month1 = date("M", $timestamp1);
					$year1 = date("Y", $timestamp1);
					$value_date = $Day1." ".$day1.", ".$month1.$year1;

					$balance = $result['amount'] + $bal;
					echo '
							<tr>
								<td>'.++$count.'</td>
								<td><span>&#8358</span> '.$result['amount'].'</td>
								<td>'.$expense_date.'</td>
								<td>'.$value_date.'</td>
								<td>'.$result['expense_source'].'</td>
								<td>'.$result['description'].'</td>
								<td><span>&#8358</span> '.$balance.'</td>
							</tr>
						';
				}
			}else{
				echo 'no data <br>'.$sql;
			}
		}

		public function getRecords($num){
			$count=1; $sum=0;
			switch ($num) {
				case '1':
					#Credit Account query
					$sql = "SELECT * FROM income WHERE company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['credit_date']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$credit_date = $Day." ".$day.", ".$month." ".$year;
							/***************************************
							create a time stamp for the value date
							****************************************/
							$timestamp1 = strtotime($result['dates']);
							$day1 = date("d", $timestamp1);
							$Day1 = date("D", $timestamp1);
							$month1 = date("M", $timestamp1);
							$year1 = date("Y", $timestamp1);
							$value_date = $Day1." ".$day1.", ".$month1." ".$year1;

							if($result['error'] == 1){
								echo '<tr class="text-danger">                 
			                            <td>'.$count.'</td>
			                            <td>'.$result['id'].'</td>
			                            <td>'.$result['income_source'].'</td>
			                            <td>'.$result['description'].'</td>
			                            <td>'.$result['amount'].'</td>
			                            <td>'.$credit_date.'</td>
			                            <td>'.$value_date.'</td>
			                            <td>'.$result['error_description'].'</td>
			                         </tr>';
							}else{
								echo '<tr>                 
			                            <td>'.$count.'</td>
			                            <td>'.$result['id'].'</td>
			                            <td>'.$result['income_source'].'</td>
			                            <td>'.$result['description'].'</td>
			                            <td>'.$result['amount'].'</td>
			                            <td>'.$credit_date.'</td>
			                            <td>'.$value_date.'</td>
			                            <td>'.$result['error_description'].'</td>
			                         </tr>';
							}
		                         $count++;
						}
						return true;
					}else{
						echo "No Data Found!";
						return false;
					}
					break;
				case '2':
					# Debit Account query
					$sql = "SELECT * FROM expense WHERE company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['expense_date']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$expense_date = $Day." ".$day.", ".$month." ".$year;
							/***************************************
							create a time stamp for the value date
							****************************************/
							$timestamp1 = strtotime($result['dates']);
							$day1 = date("d", $timestamp1);
							$Day1 = date("D", $timestamp1);
							$month1 = date("M", $timestamp1);
							$year1 = date("Y", $timestamp1);
							$value_date = $Day1." ".$day1.", ".$month1." ".$year1;

							if($result['error'] == 1){
								echo '<tr class="text-danger">                 
			                            <td>'.$count.'</td>
			                            <td>'.$result['id'].'</td>
			                            <td>'.$result['expense_source'].'</td>
			                            <td>'.$result['description'].'</td>
			                            <td>'.$result['amount'].'</td>
			                            <td>'.$expense_date.'</td>
			                            <td>'.$value_date.'</td>
			                            <td>'.$result['error_description'].'</td>
			                         </tr>';
							}else{
								echo '<tr>                 
			                            <td>'.$count.'</td>
			                            <td>'.$result['id'].'</td>
			                            <td>'.$result['expense_source'].'</td>
			                            <td>'.$result['description'].'</td>
			                            <td>'.$result['amount'].'</td>
			                            <td>'.$expense_date.'</td>
			                            <td>'.$value_date.'</td>
			                            <td>'.$result['error_description'].'</td>
			                         </tr>';
							}
		                         $count++;
						}
					}else{
						echo "No Data Found!";
						return false;
					}
					break;
				case '3':
					#Get The sum total of the the credited amount
					$sql = "SELECT SUM(amount) AS sumtotal FROM income WHERE error=0 AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$data=$stmt->getResults();
						$data['sumtotal'] +=0;
						echo '<p class="text-success">Total Credited Amount: <span>&#8358</span>'.$data['sumtotal'].'.00</p>';
					}
					break;
				case '4':
					#Get The Sum Total of the Debited Amount
					$sql = "SELECT SUM(amount) AS sumtotal FROM expense WHERE error=0 AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$data=$stmt->getResults();
						$data['sumtotal'] +=0;
						echo '<p class="text-danger">Total Debited Amount: <span>&#8358</span>'.$data['sumtotal'].'.00</p>';
					}
					break;
				default:
					# code...
					break;
			}
		}

		public function validateData($data){
			$data = addslashes($data);
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public function test(){
			$day = date('Y-m');
			$sql = "SELECT * FROM income WHERE credit_date='$day'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				echo 'TRUE!!!'.'<br>';
				//var_dump($stmt);
				while ($data=$stmt->getResults()) {
					echo $data['income_source'].'<br>';
					echo $data['description'].'<br>';
					echo $data['amount'].'<br>';
					echo $data['credit_date'].'<br>';
				}
			}else{
				echo "FALSE!!!";
			}
		}

		public function errorHandle($values){
			$slipId = $values['slipId'];
			$errorType = $values['error'];
			$error_desc = $this->validateData($values['error_desc']);
			switch ($errorType) {
				case '1':
					# credit error
					if($this->getAmount($slipId,$error_desc,1)){
						echo "<script>alert('Your Account has been Debited with SlipId:".$slipId."')</script>";
					}
					break;
				case '2':
					# debit error
					if($this->getAmount($slipId,$error_desc,2)){
						echo "<script>alert('Your Account has been Credited with SlipId:".$slipId."')</script>";
					}
					break;
				
				default:
					#when no error type was chosen
				echo "<script>alert('Please choose a preferred error type')</script>";
					break;
			}
			
		}

		public function getAmount($id,$error_desc,$type) {
			switch ($type) {
				case '1':
					# Get The Amount connected to the particuler slipId($id) in the income table
					$sql = "SELECT amount FROM income WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql->ifExist()>0){
						$data=$runsql->getResults();
						$amt=$data['amount'];
						#since the error occured in crediting the account, we have to debit the account (2)
						if($this->setBalance($amt,2) && $this->errorMarker($id,$error_desc,1)){
							return true;
						}
					}else{
						echo "<script>alert('Invalid slipId. Please Cross check the slipId (".$id.")')</script>";
					}
					break;
				case '2':
					# Get The Amount connected to the particuler slipId($id) in the expense table
					$sql = "SELECT amount FROM expense WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql->ifExist()>0){
						$data=$runsql->getResults();
						$amt=$data['amount'];
						#since the error occured in debiting the account, we have to credit it back (1)
						if($this->setBalance($amt,1) && $this->errorMarker($id,$error_desc,2)){
							return true;
						}
					}else{
						echo "<script>alert('Invalid slipId. Please Cross check the slipId (".$id.")')</script>";
					}
					break;			
				default:
					# code...
					break;
			}
		}

		public function errorMarker($id,$error_desc,$table){
			switch ($table) {
				case '1':
					# code...
					$sql = "UPDATE income SET error_description='$error_desc', error=1 WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					#$sql = "DELETE FROM income WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql){
						return true;
					}
					break;
				case '2':
					# code...
					$sql = "UPDATE expense SET error_description='$error_desc', error=1 WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					#$sql = "DELETE FROM expense WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql){
						return true;
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function getStatement($values,$openBal){
			$startDate = $values['s_date'];
			$endDate = $values['e_date'];
			$dateStamp1 = strtotime($startDate);
			$dateStamp2= strtotime($endDate);
			$s_d = date("d", $dateStamp1);
			$e_d = date("d", $dateStamp2);
			$s_y = date("Y", $dateStamp1);
			$e_y = date("Y", $dateStamp2);

			$sql = "SELECT * FROM income,expense WHERE company_id='".$_SESSION['id']."' (DAY(credit_date) BETWEEN $s_d AND $e_d) AND (YEAR(credit_date) BETWEEN $s_y AND $e_y)";
			$stmt = DB::DBInstance()->query($sql); var_dump($stmt);
			if($stmt){
				echo "running";
				return $stmt->getResults();
			}
			//echo "Failed";
			
		}

		public function statement_facts($values){
			$startDate = $values['s_date'];
			$endDate = $values['e_date'];

			#GET THE TOTAL BALANCE OF ALL INCOME BEFORE THE START OF THE MONTH.
			$sql = "SELECT SUM(amount) as credit FROM income WHERE error=0 AND credit_date<='$startDate' AND company_id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
				$data=$stmt->getResults();
				$credit = $data['credit'];
			#GET THE TOTAL BALANCE OF ALL EXPENSE BEFORE THE START OF THE MONTH.
			$sql = "SELECT SUM(amount) as debit FROM expense WHERE error=0 AND expense_date<='$startDate' AND company_id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
				$data=$stmt->getResults();
				$debit = $data['debit'];

			$openningBal = $credit - $debit;
			return $openningBal;
		}
	}
?>