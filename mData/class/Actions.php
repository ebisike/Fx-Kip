<?php
	/**
	 * 
	 */
	class Actions extends DB {
		public function register($value){
			$comp_name = $this->validateForm($value['comp_name']);
			$email = $this->validateForm($value['email']);
			$pwd = md5($this->validateForm($value['pwd']));

			$sql = "SELECT * FROM users WHERE company_name='$comp_name'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt->ifExist()>0){
				$msg = 'compamy name already in use';
				return $msg;
			}

			$sql = "SELECT * FROM users WHERE email='$email'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt->ifExist()>0){
				$msg = 'Email already in use';
				return $msg;
			}

			$sql = "INSERT INTO users (company_name,email,password) VALUES ('$comp_name','$email','$pwd')";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				if($results = $this->getRegistrationInfo($email,$comp_name,1)){
					$id = $results['id'];
					$sql = "INSERT INTO balance (balance,company_id) VALUES (0,'$id')";
					if($stmt = DB::DBInstance()->query($sql)){
						$msg = 'Registration Successful!';
						return $msg;
					}else{
						$msg = "balance not inserted";
						return $msg;
					}
				}else{
					$msg = "Id not gotten";
					return $msg;
				}
			}else{
				$msg = 'Registration failed';
				return $msg;
			}
		}

		public function getRegistrationInfo($email,$comp_name,$case){
			switch ($case) {
				case '1':
					$sql = "SELECT id FROM users WHERE email='$email' AND company_name='$comp_name'";
					if($stmt = DB::DBInstance()->query($sql)){
						return $stmt->getResults();
					}else{
						echo "fails to get";
						return false;
					}
					break;
				case '2':
					$sql = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						return $result;
					}else{
						return false;
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function getEvents($value){
			# 1=birthday today, 2=bithday weekly, 3=marriage anniversary today, 4=marriage anniversary weekly
			$day = date('d');
			$month = date('m');
			$yearx = date('Y');
			$day7 = $day + 7;
			$count = 1;
			//echo $value;

			switch ($value) {
				case '1':
					# Get Birthdays for today
				$sql = "SELECT * FROM basic_info WHERE DAY(date_of_birth)='$day' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
				$stmt = DB::DBInstance()->query($sql);
				if($stmt){
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['date_of_birth']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$birthday = $Day." ".$day.", ".$month." ".$year;
							/***************************************/
							$name = $result['last_name'].' '.$result['other_name'].' '.$result['first_name'];
							$age = $yearx - substr($result['date_of_birth'], 0,4);
							echo '<tr>
	                                <td>'.$count.'</td>
	                                <td>'.$name.'</td>
	                                <td>'.$birthday.'</td>
	                                <td>'.$age.'</td>
	                              </tr>';
	                              $count++;
						}
						return true;
					}else{
						echo "NO RECORDS FOUND!";
						return false;
					}
				}
					break;

				case '2':
					# Get birthdays for the week
				$sql = "SELECT * FROM basic_info WHERE DAY(date_of_birth) BETWEEN '$day' AND '$day7' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
				$stmt = DB::DBInstance()->query($sql);
				if($stmt){
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['date_of_birth']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$birthday = $Day." ".$day.", ".$month." ".$year;
							/***************************************/
							$name = $result['last_name'].' '.$result['other_name'].' '.$result['first_name'];
							$age = $yearx - substr($result['date_of_birth'], 0,4);

							echo '<tr>
	                                <td>'.$count.'</td>
	                                <td>'.$name.'</td>
	                                <td>'.$birthday.'</td>
	                                <td>'.$age.'</td>
	                              </tr>';
	                              $count++;
						}
						return true;
					}else{
						echo "NO RECORDS FOUND!";
						return false;
					}
				}
				break;

				case '3':
					# code...
					$sql = "SELECT * FROM marital_info WHERE DAY(date_of_marriage)='$day' AND MONTH(date_of_marriage)='$month' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql){
						if($runsql->ifExist()>0){
							while ($result=$runsql->getResults()) {
								/************************************
								create a time stamp for the expense date
								****************************************/
								$timestamp = strtotime($result['date_of_marriage']);
								$day = date("d", $timestamp);
								$Day = date("D", $timestamp);
								$month = date("M", $timestamp);
								$year = date("Y", $timestamp);
								$marriageday = $Day." ".$day.", ".$month." ".$year;
								/***************************************/
								$marriage = substr($result['date_of_marriage'], 0,4);
								$anniversary = $yearx - $marriage;

								echo '<tr>
		                                <td>'.$count.'</td>
		                                <td>'.$result['name_of_spouse'].'</td>
		                                <td>'.$marriageday.'</td>
		                                <td>'.$anniversary.'</td>
		                              </tr>';
		                              $count++;
							}
								return true;
						}else{
							echo "NO RECORDS FOUND!";
							return false;
						}
					}
					break;
				
				case '4':
					# code...
					$sql = "SELECT * FROM marital_info WHERE DAY(date_of_marriage) BETWEEN '$day' AND '$day7' AND MONTH(date_of_marriage)='$month' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					if($runsql){
						if($runsql->ifExist()>0){
							while ($result=$runsql->getResults()) {
								/************************************
								create a time stamp for the expense date
								****************************************/
								$timestamp = strtotime($result['date_of_marriage']);
								$day = date("d", $timestamp);
								$Day = date("D", $timestamp);
								$month = date("M", $timestamp);
								$year = date("Y", $timestamp);
								$marriageday = $Day." ".$day.", ".$month." ".$year;
								/***************************************/
								$marriage = substr($result['date_of_marriage'], 0,4);
								$anniversary = $yearx - $marriage;

								echo '<tr>
		                                <td>'.$count.'</td>
		                                <td>'.$result['name_of_spouse'].'</td>
		                                <td>'.$marriageday.'</td>
		                                <td>'.$anniversary.'</td>
		                              </tr>';
		                              $count++;
							}
							return true;
						}else{
							echo "NO RECORDS FOUND!";
							return false;
						}
					}
					break;

				case '5':
					$sql = "SELECT * FROM children_info WHERE DAY(date_of_birth)='$day' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()){	
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['date_of_birth']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$birthday = $Day." ".$day.", ".$month." ".$year;
							/***************************************/
							$age = $yearx - substr($result['date_of_birth'], 0,4);

							echo 
								'
									<tr>
										<td>'.$count.'</td>
										<td>'.strtoupper($result['full_name']).'</td>
										<td>'.$birthday.'</td>
										<td>'.$age.'</td>
									</tr>
								';
								$count++;
						}
						return true;
					}else{
						echo "NO RECORDS FOUND!";
						return false;
					}
					break;

				case '6':
					$sql = "SELECT * FROM children_info WHERE DAY(date_of_birth) BETWEEN '$day' AND '$day7' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt->ifExist()>0){
						while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['date_of_birth']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$birthday = $Day." ".$day.", ".$month." ".$year;
							/***************************************/
							$age = $yearx - substr($result['date_of_birth'], 0,4);

							echo 
								'
									<tr>
										<td>'.$count.'</td>
										<td>'.strtoupper($result['full_name']).'</td>
										<td>'.$birthday.'</td>
										<td>'.$age.'</td>
									</tr>
								';
								$count++;
						}
					}else{
						echo "NO RECORDS FOUND!";
						return false;
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function tester1($id){
			$sql = "SELECT * FROM basic_info WHERE id='$id' AND company_id='".$_SESSION['id']."'";
								$run = DB::DBInstance()->query($sql);
								$basic = $run->getResults();
								$name = $basic['last_name'].' '.$basic['other_name'].' '.$basic['first_name'];

								return $name;
		}
		public function tester2($id){
			$sql = "SELECT * FROM contact_info WHERE ref_id='$id' AND company_id='".$_SESSION['id']."'";
								$run = DB::DBInstance()->query($sql);
								$contact = $run->getResults();
								return $contact;
		}

		public function countEvents($value){
			# 1=birthday today, 2=bithday weekly, 3=marriage anniversary today, 4=marriage anniversary weekly
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$day7 = $day + 7;
			switch ($value) {
				case '1':
				# count how many people have their birthdays for the current day.
				$sql = "SELECT COUNT(id) FROM basic_info WHERE DAY(date_of_birth)='$day' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
				$stmt = DB::DBInstance()->query($sql);
				if($stmt){
					$result = $stmt->getResults();
					echo $result['COUNT(id)'];
					return true;
				}
				echo "Failed!!!";
				return false;
					break;

				case '2':
					$sql = "SELECT COUNT(id) FROM basic_info WHERE DAY(date_of_birth) BETWEEN '$day' AND '$day7' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					echo "FAILED!!";
					return false;
					break;

				case '3':
					$sql = "SELECT COUNT(id) FROM marital_info WHERE DAY(date_of_marriage)='$day' AND MONTH(date_of_marriage)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result=$stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					echo "Failed!!!";
					return false;
					break;

				case '4':
					$sql = "SELECT COUNT(id) FROM marital_info WHERE DAY(date_of_marriage) BETWEEN '$day' AND '$day7' AND MONTH(date_of_marriage)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					echo 'Failed!!!';
					return false;
					break;

				case '5':
					$sql = "SELECT COUNT(id) FROM children_info WHERE DAY(date_of_birth)='$day' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					echo 'FAILED';
					return false;
					break;

				case '6':
					$sql = "SELECT COUNT(id) FROM children_info WHERE DAY(date_of_birth) BETWEEN '$day' AND '$day7' AND MONTH(date_of_birth)='$month' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					echo "FAILED";
					return false;
					break;
				
				default:
					# code...
					break;
			}
		}

		public function countInfo($num){
			# 1=student, 2=civil servants, 3=enterprenures
			switch ($num) {
				case '1':
					$sql = "SELECT COUNT(id) FROM social_info WHERE occupation='student' AND company_id='".$_SESSION['id']."'";
					$stmt  = DB::DBInstance()->query($sql);
					if($stmt){
						$result=$stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					break;

				case '2':
					$sql = "SELECT COUNT(id) FROM social_info WHERE occupation='Entrepreneur' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result=$stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					break;

				case '3':
					$sql = "SELECT COUNT(id) FROM social_info WHERE occupation='civil servant' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result=$stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					break;

				case '4':
					# get total number of children
					$sql = "SELECT COUNT(id) FROM children_info WHERE company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						echo $result['COUNT(id)'];
						return true;
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function validateForm($data){
			$data = addslashes($data);
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public function delete(){
			$sql = "DELETE FROM expense";
			$r = DB::DBInstance()->query($sql);
		}

		public function deceased($values){
			$id = $values['ripId'];
			$date_of_death = $values['dod'];

			$sql = "UPDATE Basic_info SET deceased = 1, date_of_death='$date_of_death' WHERE id='$id' AND company_id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				return true;
			}
		}
	}
?>