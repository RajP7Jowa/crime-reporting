<?php

	class pdo_database{
		private $db_conn;
		//private $stmt;
		
		public function __construct(){
			try{
			$this ->db_conn = new PDO('mysql:host=localhost;dbname=station',"root","p9178");
			return $this->db_conn;
			}
			catch(PDOException $e){
				echo "Could not connect to database. Check you database parameters";
			}
		}
		
		
		public function get_crimes(){
			$sql = "SELECT Status,Category,Description,Crime_Scene,Suspects FROM crimes ";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$crimes = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $crimes;
		}
		
		
		
		public function get_abstract_application(){
			$sql = "SELECT ID_Number,Type FROM applications";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $applications;
		}
		
		public function getDetailedInfo($id){
			$sql = "SELECT firstName,lastName,ID_Number,Location,Gender FROM persons WHERE ID_Number = :id_number";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			
			$info = $stmt->fetch(PDO::FETCH_ASSOC);
			
			
			extract($info);
			
			$Gender = ($Gender == 'm')?'Male':'Female';
			
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>FirstName:</b></td><td>'.$info['firstName'].'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>LastName:</b></td><td>'.$lastName.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>ID Number:</b></td><td>'.$ID_Number.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Location:</b></td><td>'.$Location.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Gender:</b></td><td>'.$Gender.'</td></tr>';
			echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Crme record:</b></td><td>Good</td></tr>';
	}
		
		public function getStatictics(){
			$sql = "SELECT Category,COUNT(*) AS number FROM crimes GROUP BY Category";
			
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			$stat = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $stat;
		}
		
		public function login($email,$password){
			$sql = "SELECT email,password FROM users WHERE email=:email AND password=:password";
			$stmt = $this ->db_conn ->prepare($sql);
			
			$results = $stmt -> execute(array(
				':email' => $email,
				':password' => $password
			));
			
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $details;
			}
			
		}
		
		public function register($data){
			extract($data);
			
			$password = sha1($password);
			$sql = "INSERT INTO users () VALUES(?,?,?)";
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute(array($id_number,"$password","$email"));
			
			if($results){
				return $results;
				die();
			}
			
			
		}
		
		public function register_person($data){
			extract($data);
			$sql = "INSERT INTO persons () VALUES(?,?,?,?,?)";
				$stmt = $this -> db_conn -> prepare($sql);
				$results = $stmt-> execute(array("$firstName","$lastName",$id_number,"$county","$gender"));
				
				if($results){
					return $results;
				}
				
		}
		
		public function getTotalCrimes(){
			$sql = "SELECT COUNT(*) AS number FROM crimes";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
			
		}
		
		public function getTotalMissingPersons(){
			$sql = "SELECT COUNT(*) AS number FROM missing_persons WHERE status = 'Not Found'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
			
		}
		
		public function  getTotalMissingVehicles(){
			$sql = "SELECT COUNT(*) as number FROM missing_vehicles";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
				echo $details[0]['number'];
				return;
			}
		}
		
		public function  getTotalLostItems(){
			$sql = "SELECT COUNT(*) as number FROM items WHERE status = 'Not found'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo $details[0]['number'];
				return;
			}
		}
		
		public function getApplications(){
			$sql = "SELECT ID_number, Type FROM applications WHERE status= 'Not issued'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				if(count($rows) > 0){
					echo '<tr style="border-bottom:2px solid #000;">';
					echo '<td><b>Category</b></td>';
					echo '<td text-align="center"><b>Action</b></td>';
					echo '</tr>';
					foreach($rows as $row){
						echo '<tr class="border-bottom:1px solid #6f716d;"><td>'.ucfirst($row['Type']).'</td><td><a href="application.php?id='.$row['ID_number'].'">View</a></td></tr>'	;
					}
				}
				else{
					echo "No applications";
				} 	
			}
			
			
			return;
			
		}
		
		public function aplicationHandler($id){
			$sql = "UPDATE  applications SET status = 'Granted' WHERE ID_number = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		
		public function getStollenVehicles(){
			$sql = "SELECT Number_plate FROM missing_vehicles WHERE reviewed = 'Not reviewed'";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Missing</td><td>'.$row['Number_plate'].'</td><td><a href="missing.php?id='.urlencode($row['Number_plate']).'">View</a></td></tr>';
					}
				}
					
			}
			return;
			
		}
		
		public function getDetailedInfoVehicle($id){
			$sql = "SELECT Model,Owner,image,description,phoneNumber FROM missing_vehicles WHERE Number_plate = ?";
	
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$id"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Model:</b></td><td>'.$rows[0]['Model'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Number Plate:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
		}

		public function getDetailedInfoPerson($name){
			$sql = "SELECT Address,image,description,phoneNumber FROM missing_persons WHERE fullName = '$name'";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$name"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Names:</b></td><td>'.$name.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Address:</b></td><td>'.$rows[0]['Address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
		}

		public function getDetailedInfoPersonFound($name){
			$sql = "SELECT Address,image,description,phoneNumber FROM missing_persons WHERE fullName = '$name'";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$name"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Names:</b></td><td>'.$name.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Address:</b></td><td>'.$rows[0]['Address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
			}
				
			}
			return;
		}

			public function getDetailedInfoVehicleFound($id){
			$sql = "SELECT Model,location_seen,image,description,phoneNumber FROM missing_vehicles_found WHERE Number_plate = '$id'";
			
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$id"));
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Model:</b></td><td>'.$rows[0]['Model'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Number Plate:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location seen:</b></td><td>'.$rows[0]['location_seen'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';
					
			}
				
			}
			return;
		}

		public function updateAlert($number){
			$sql = "UPDATE missing_vehicles SET reviewed = 'post' WHERE Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		
		public function getFoundVehicles(){
			$sql = "SELECT Number_plate FROM missing_vehicles_found WHERE status = 'Not reviewed'";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					
					
					foreach($rows as $row){
						echo '<tr><td>Found</td><td>'.$row['Number_plate'].'</td><td><a href="missing.php?id='.urlencode($row['Number_plate']).'&status=found">View</a></td></tr>';
					}
				}
				else{
					echo "No Records to display";
				} 	
			}
			
			
		}
		

		public function updateAlertFound($number){
			$sql = "UPDATE missing_vehicles SET reviewed = 'post' WHERE Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
			
		}
		
		public function removeAlert($plate){
			$sql = "UPDATE missing_vehicles SET reviewed = 'Found' WHERE Number_plate = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($plate));
			
			if($results){
				$sql = "UPDATE missing_vehicles_found SET status = 'reviewed' WHERE Number_plate = '$plate'";
				
				$stmt = $this -> db_conn -> prepare($sql);
				$results = $stmt -> execute(array($plate));
						
			    $rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		public function removeAlert2($person){
			$sql = "UPDATE missing_persons SET alert = 'post' WHERE fullName = ?";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($person));
			
			if($results){		
			    $rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		public function getMissingPersons(){
			$sql = "SELECT fullName FROM missing_persons WHERE Status = 'Not Found' AND alert = 'Not posted'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Missing</td><td>'.$row['fullName'].'</td><td><a href="missingPerson.php?n='.urlencode($row['fullName']).'">View</a></td></tr>';
					}
				}
				else{
					echo "No Records to display";
				} 	
			}
			
		}
		
		public function getFoundPersons(){
			$sql = "SELECT fullName FROM missing_persons WHERE Status = 'Found' AND alert = 'Not posted'";
			
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();
			
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>Found</td><td>'.$row['fullName'].'</td><td><a href="missingPerson.php?n='.urlencode($row['fullName']).'&status=found">View</a></td></tr>';
					}
				}
					
			}
			
		}
		
		public function postAlert($name){
			$sql = "UPDATE missing_persons SET alert = 'post' WHERE fullName = '$name'";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($name));
			
			if($results){
					$rows_affected = $stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}
		
		
	}

	$db_conn = new pdo_database();

?>