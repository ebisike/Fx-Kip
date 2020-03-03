<?php
	/**
	 * 
	 */
	class FetchData extends DB
	{
		
		public function getBasicInfo($num,$id){
			// case 1: is to get specify user data in a table
			// case 2: is to display all records in the record book
			//case 3: is to get specify user data for form values
			switch ($num) {
				case '1':
					$sql = "SELECT * FROM Basic_info WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						$result = $stmt->getResults();
						return $result;
					}
					break;
				case '2':
					$sql = "SELECT * FROM Basic_info WHERE deceased=0 AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					$count=1;
					if($stmt){
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
							//$date = $result['date_of_birth'];
							//echo $date;
							echo '<tr>                 
		                            <td>'.$count.'</td>
		                            <td>'.$result['stewardship'].'</td>
		                            <td><a href="view_data.php?var='.$result['id'].'&name='.$result['first_name'].' '.$result['last_name'].'">'.$result['first_name'].'</a></td>
		                            <td>'.$result['last_name'].'</td>
		                            <td>'.$result['other_name'].'</td>
		                            <td>'.$birthday.'</td>
		                            <td>'.$result['gender'].'</td>
		                            <td><a href="edit_data.php?id='.$result['id'].'"><i class="fa fa-edit fa-fw"></a></i></td>
		                            <td><a href="deceased.php?id='.$result['id'].'"><i class="fa fa-archive fa-fw"></i></a></td>
		                         </tr>';
		                         $count++;
						}
					}
					break;
				case '3':
					$sql = "SELECT * FROM Basic_info WHERE id='$id' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return $stmt->getResults();
					}
					break;
				
				default:
					# code...
					break;
			}
		}

		public function getContactInfo($id){
			$sql = "SELECT * FROM contact_info WHERE ref_id='$id'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$result=$stmt->getResults();
				return $result;
			}
		}

		public function getSocialInfo($id){
			$sql = "SELECT * FROM social_info WHERE ref_id='$id'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$result=$stmt->getResults();
				return $result;
			}
		}

		public function getChurchInfo($id){
			$sql = "SELECT * FROM church_info WHERE ref_id='$id'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$result=$stmt->getResults();
				return $result;
			}
		}

		public function getMaritalInfo($id){
			$sql = "SELECT * FROM marital_info WHERE ref_id='$id'";
			$stmt = DB::DBInstance()->query($sql);
			if($stmt){
				$result=$stmt->getResults();
				return $result;
			}
		}

		public function getChildrenInfo($id,$case){
			switch ($case) {
				case '1':
					# code...
					$sql = "SELECT * FROM children_info WHERE ref_id='$id'";
					$stmt = DB::DBInstance()->query($sql);
					$count=1;
					if($stmt->ifExist()>0){
						while($result = $stmt->getResults()){
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
							echo '
								<tr>
									<td>'.$count.'</td>
									<td>'.$result['id'].'</td>
									<td>'.strtoupper($result['full_name']).'</td>
									<td>'.$birthday.'</td>
								</tr>
							';
							$count++;
						}
					}else{
						echo 'This person has no registered child';
					}
					break;
				case '2':
					# code...
					$sql = "SELECT * FROM children_info WHERE ref_id='$id'";
					$stmt = DB::DBInstance()->query($sql);
					$count=1;
					if($stmt->ifExist()>0){
						while($result = $stmt->getResults()){
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
							echo '
								<tr>
									<td>'.$count.'</td>
									<td>'.strtoupper($result['full_name']).'</td>
									<td>'.$birthday.'</td>
								</tr>
							';
							$count++;
						}
					}else{
						echo 'This person has no registered child';
					}
					break;
				default:
					# code...
					break;
			}
		}

		public function getDeceased(){
			$sql = "SELECT * FROM Basic_info WHERE deceased=1 AND company_id='".$_SESSION['id']."'";
			$stmt = DB::DBInstance()->query($sql);
			$count=0;

			if($stmt){
				while ($result=$stmt->getResults()) {
							/************************************
							create a time stamp for the expense date
							****************************************/
							$timestamp = strtotime($result['date_of_death']);
							$day = date("d", $timestamp);
							$Day = date("D", $timestamp);
							$month = date("M", $timestamp);
							$year = date("Y", $timestamp);
							$deathday = $Day." ".$day.", ".$month." ".$year;
							/***************************************/
							//$date = $result['date_of_birth'];
							//echo $date;
							echo '<tr>                 
		                            <td>'.++$count.'</td>
		                            <td>'.$result['stewardship'].'</td>
		                            <td><a href="view_data.php?var='.$result['id'].'&name='.$result['first_name'].' '.$result['last_name'].'">'.$result['first_name'].'</a></td>
		                            <td>'.$result['last_name'].'</td>
		                            <td>'.$result['other_name'].'</td>
		                            <td>'.$result['date_of_birth'].'</td>
		                            <td>'.$result['gender'].'</td>
		                            <td>'.$deathday.'</td>
		                            <td><a href="edit_data.php?id='.$result['id'].'"><i class="fa fa-edit fa-fw"></a></i></td>
		                         </tr>';
						}
			}
		}
	}
?>