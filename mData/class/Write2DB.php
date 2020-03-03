<?php
	/**
	 * 
	 */
	class Write2DB extends DB
	{
		public function setBasicData($case,$values,$ref_id) {
			$stewardship = $this->validateForm($values['stewardship']);
			$lName = $this->validateForm(strtoupper($values['lName']));
			$fName = $this->validateForm(strtoupper($values['fName']));
			$oName = $this->validateForm(strtoupper($values['oName']));
			$dob = $this->validateForm($values['dob']);
			$sex = $this->validateForm(strtoupper($values['sex']));


			if(empty($_FILES['file']['name'])){
	        	if($sex == 'MALE'){
	        		$imageName = 'fx_male_Avatar.png';
	        	}else{
	        		$imageName = 'fx_female_Avatar.png';
	        	}
	        }else{
				#get the file name
		        $imageName = basename($_FILES['file']['name']);
		        $fileSize = $_FILES['file']['size']; echo $fileSize/1048576 . '<br>';
		        $imageName = $lName.'_'.$fName.'_'.$imageName;
		        #create a directory for the image
		        $targetDir = "passports/";
		        #create a file path
		        $targetFilePath = $targetDir . $imageName;
		        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	        	$allowedFileType = array('jpg','jpeg','png','JPG','JPEG','PNG');

	        	if(in_array($fileType, $allowedFileType)){
	        		if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
		        			//echo 'moved';
		        	}
	        	}else{
				    echo "<script>alert('The type of image being uploaded is not allowed. Please Choose a different Image.')</script>";
				}
	        }




			//sql code
			switch ($case) {
				case '1':
					$sql = "SELECT * FROM basic_info WHERE stewardship='$stewardship' AND first_name='$fName' AND last_name='$lName' AND company_id='".$_SESSION['id']."'";
					$run = DB::DBInstance()->query($sql);
					if(!$run->ifExist()>0){
						//if(in_array($fileType, $allowedFileType)){
				            //if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
				                $sql = "INSERT INTO basic_info
				                	(passport,stewardship,last_name,first_name,other_name,date_of_birth,gender,company_id)
				                	VALUES ('$imageName','$stewardship','$lName','$fName','$oName','$dob','$sex','".$_SESSION['id']."')";

								$stmt = DB::DBInstance()->query($sql);
								if($stmt){
									//fetch the id of the user data
									$sql = "SELECT * FROM basic_info WHERE stewardship='$stewardship' AND last_name='$lName' AND first_name='$fName' AND company_id='".$_SESSION['id']."'";
									$runsql = DB::DBInstance()->query($sql);
									if($runsql->ifExist()>0){
										$result = $runsql->getResults();
									}
									return $result;
								}
								return false;
							//}
				        //}
					}else{
						$sql = "UPDATE basic_info SET
							passport='$ref_id',stewardship='$stewardship',last_name='$lName',first_name='$fName',
							other_name='$oName',date_of_birth='$dob',gender='$sex'
							WHERE id='$ref_id' AND company_id='".$_SESSION['id']."'";
						$runsql = DB::DBInstance()->query($sql);
						if($runsql){
							return true;
						}
					}
					break;

				case '2':
					$sql = "UPDATE basic_info SET
							stewardship='$stewardship',last_name='$lName',first_name='$fName',other_name='$oName',passport='$imageName',
							date_of_birth='$dob',gender='$sex'
							WHERE id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$runsql = DB::DBInstance()->query($sql);
					return true;
					break;
						
				default:
					
					break;
			}

		}

		public function setContactData($values,$ref_id) {
			$ref_id = $this->validateForm($ref_id);
			$address = $this->validateForm(strtoupper($values['address']));
			$tel1 = $this->validateForm($values['tel1']);
			$tel2 = $this->validateForm($values['tel2']);
			$email = $this->validateForm($values['email']);
			$state = $this->validateForm(strtoupper($values['state']));
			$lga = $this->validateForm(strtoupper($values['lga']));
			$villa = $this->validateForm(strtoupper($values['villa']));
			
			#check if this particular data has been submitted before
			$sql = "SELECT * FROM contact_info WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
			$run = DB::DBInstance()->query($sql);
			if($run){
				if(!$run->ifExist()>0){
				//sql query to insert new data if ref_id does not exist.
				$sql = "INSERT INTO contact_info (ref_id,Address,phone1,phone2,email,state_of_origin,LGA,village,company_id) VALUES ('$ref_id','$address','$tel1','$tel2','$email','$state','$lga','$villa','".$_SESSION['id']."')";
				$stmt = DB::DBInstance()->query($sql);
				if($stmt){
					return true;
				}
				return false;
				}else{
					$sqlUpdate = "UPDATE contact_info SET Address='$address',phone1='$tel1',phone2='$tel2',email='$email',state_of_origin='$state',LGA='$lga',village='$villa' WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$runUpdate = DB::DBInstance()->query($sqlUpdate);
					if($runUpdate){
						return true;
					}
					return false;
				}
			}
		}

		public function setMaritalData($values,$ref_id) {
			$ref_id = $this->validateForm($ref_id);
			$marital = $this->validateForm(strtoupper($values['marital']));
			$title = $this->validateForm($values['title']);
			$spouse = $this->validateForm(strtoupper($values['spouse']));
			$marriageNature = (strtoupper($values['marriageNature']));
			$dom = $this->validateForm($values['dom']);
			$child = $this->validateForm($values['child']);

			if(!empty($spouse)){
				$spouse = $title.' '.$spouse;
			}else{
				$spouse = $spouse;
			}

			#check if this particular data has been submitted before
			$sql = "SELECT * FROM marital_info WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
			$run = DB::DBInstance()->query($sql);
			if($run){
				if(!$run->ifExist()>0){
					$sql = "INSERT INTO marital_info (ref_id,marital_status,name_of_spouse,nature_of_marriage,date_of_marriage,number_of_children,company_id) VALUES ('$ref_id','$marital','$spouse','$marriageNature','$dom','$child','".$_SESSION['id']."')";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}
					return false;
				}else{
					$sqlUpdate = "UPDATE marital_info SET marital_status='$marital',name_of_spouse='$spouse',nature_of_marriage='$marriageNature',date_of_marriage='$dom',number_of_children='$child' WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$runUpdate = DB::DBInstance()->query($sqlUpdate);
					if($runUpdate){
						return true;
					}
					return false;
				}
			}

		}

		public function setSocialData($values,$ref_id) {
			$ref_id = $this->validateForm($ref_id);
			$academic = $this->validateForm($values['academic']);
			$occupation = $this->validateForm(strtoupper($values['occupation']));
			$job = $this->validateForm(strtoupper($values['job']));
			$bizAddress = $this->validateForm(strtoupper($values['bizAddress']));

			#check if this particular data has been submitted before
			$sql = "SELECT * FROM social_info WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
			$run = DB::DBInstance()->query($sql);
			if($run){
				if(!$run->ifExist()>0){
					$sql = "INSERT INTO social_info (ref_id,academics,occupation,nature_of_business,business_address,company_id) VALUES ('$ref_id','$academic','$occupation','$job','$bizAddress','".$_SESSION['id']."')";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}
					return false;	
				}else{
					$sqlUpdate = "UPDATE social_info SET academics='$academic',occupation='$occupation',nature_of_business='$job',business_address='$bizAddress' WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$runUpdate = DB::DBInstance()->query($sqlUpdate);
					if($runUpdate){
						return true;
					}
					return false;
				}
			}

		}
		
		public function setChurchData($values,$ref_id) {
			$ref_id = $this->validateForm($ref_id);
			$baptizim = $this->validateForm($values['baptizim']);
			$dob = $this->validateForm($values['dob']);
			$confirm = $this->validateForm($values['confirm']);
			$doc = $this->validateForm($values['doc']);
			$group = $values['group'];

			#check if this particular data has been submitted before
			$sql = "SELECT * FROM church_info WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
			$run = DB::DBInstance()->query($sql);
			if($run){
				if(!$run->ifExist()>0){
					$sql = "INSERT INTO church_info (ref_id,baptizim_status,date_of_baptizim,confirmation_status,date_of_confirmation,group_number,company_id) VALUES ('$ref_id','$baptizim','$dob','$confirm','$doc','$group','".$_SESSION['id']."')";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}
					return false;
				}else{
					$sqlUpdate = "UPDATE church_info SET baptizim_status='$baptizim',date_of_baptizim='$dob',confirmation_status='$confirm',date_of_confirmation='$doc',group_number='$group' WHERE ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$runUpdate = DB::DBInstance()->query($sqlUpdate);
					if($runUpdate){
						return true;
					}
					return false;
				}
			}

		}

		public function setChildData($values,$ref_id,$case){
			$ref_id = $this->validateForm($ref_id);
			$child_name = $this->validateForm($values['child_name']);
			$date_of_birth = $this->validateForm($values['dob']);
			$updateId = $this->validateForm($values['updateId']);
			// if($updateId == 0){
			// 	$case == 1;
			// }
			echo $updateId;
			switch ($case) {
				case '1':
					$sql = "INSERT INTO children_info (ref_id,full_name,date_of_birth,company_id) VALUES ('$ref_id','$child_name','$date_of_birth','".$_SESSION['id']."')";
					$stmt = DB::DBInstance()->query($sql);
					if($stmt){
						return true;
					}else{
						return false;
					}
					break;

				case '2':
					$sql = "UPDATE children_info SET full_name='$child_name', date_of_birth='$date_of_birth' WHERE id='$updateId' AND ref_id='$ref_id' AND company_id='".$_SESSION['id']."'";
					$stmt = DB::DBInstance()->query($sql);
					var_dump($sql);
					if($stmt){
						return true;
					}else{
						echo 'faild';
						return false;
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
	}
?>