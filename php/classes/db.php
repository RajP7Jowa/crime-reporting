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
		
		public function report_crime($data){
			$sql = "INSERT INTO crimes(Category,Description,Crime_Scene) VALUES(?,?,?)";
			$this -> stmt = $this->db_conn->prepare($sql);
			
			
			extract($data);
			
			$location = $county." county, ".$sub_county." sub county, ".$street." road.";
			
			$this->stmt->execute(
				array(
					"$crime_type",
					"$crime_description",
					"$location"
					
				));
			return $this->db_conn-> lastInsertId();
		
		}
		
		public function apply($data){
			$sql = "INSERT INTO applications(ID_Number,Type)VALUES(?,?)";
			$stmt = $this->db_conn->prepare($sql);
			
			extract($data);
		
			
			$stmt -> execute(
				array($national_id,$type
				)
			);
			
			return $this->db_conn->lastInsertId();
		}
		
		public function report($data){
			$sql = "INSERT INTO items(Description,Last_Seen,Item_Name,category) VALUES(?,?,?,?)";
			$this -> stmt = $this->db_conn->prepare($sql);
			
			extract($data);
			
			$this->stmt->execute(
				array(
					"$item_description",
					"$last_seen",
					"$item_name",
					"$category"
					
				));
				
			return $this->db_conn->lastInsertId();
			
		}
		
		public function set_missing_person($data){
			$sql = "INSERT INTO missing_persons(fullName,Address,phoneNumber,Description,Image) VALUES(?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn->prepare($sql);
			extract($data);
			
		   $this->stmt->execute(
				array(
					"$fullName",
					"$Address",
					"$phoneNumber",
					"$Description",
					"$Image"
				));
			
				
			return $this->db_conn->lastInsertId();
		}
		
		public function set_missing_vehicle($data){
			extract($data);	
			
			$sql = "INSERT INTO missing_vehicles(Number_plate,Model,Owner,phoneNumber,national_id,description,image) VALUES(?,?,?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn -> prepare($sql);
			
			 $result = $this->stmt->execute( array(
					"$Number_plate",
					"$Model",
					"$Owner",
					"$phoneNumber",
					"$national_id",
					"$description",
					"$image"
					)
				);
				
				if($result){
					return true;	
				}
				else{
					return false;
				}	
		}
		
		public function set_missing_vehicle_found($data){
			extract($data);	
			
			$sql = "INSERT INTO missing_vehicles_found(Number_plate,Model,location_seen,phoneNumber,national_id,description,image) VALUES(?,?,?,?,?,?,?)";
			
			$this -> stmt = $this->db_conn -> prepare($sql);
			
			 $result = $this->stmt->execute( array(
					"$Number_plate",
					"$Model",
					"$location_seen",
					"$phoneNumber",
					"$national_id",
					"$description",
					"$image"
					)
				);
				
				if($result){
					return true;	
				}
				else{
					return false;
				}	
		}
		
		public function set_missing_person_found($full){
			$sql =  "UPDATE missing_persons SET Status = 'Found' WHERE fullName = '$full' AND status = 'Not Found'";
			
				$this -> stmt = $this -> db_conn -> prepare($sql);
				$results = $this -> stmt -> execute();
				
				if($results){
					$rows_affected = $this -> stmt ->rowCount();
					
					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
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
			$sql = "SELECT firstName,lastName,middleName,ID_Number,County,location FROM persons WHERE ID_Number = :id_number";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));
				
			$info = $stmt->fetch(PDO::FETCH_ASSOC);
			return info;
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
		
		public function getAlerts1(){
			$sql = "SELECT Model,Owner,Number_plate,image,description,phoneNumber FROM missing_vehicles WHERE reviewed = 'post'";
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td class="carry-up">'.$row['Model'].'</td>';
					echo '<td class="carry-up">'.$row['Number_plate'].'</td>';
					echo '<td ><img src="Uploads/missing_vehicles/'.$row['image'].'"/></td>';
					echo '<td class="carry-up">'.$row['description'].'</td>';
					echo '<td class="carry-up">0'.$row['phoneNumber'].'</td>';
					echo '<td class="carry-up"><a href="report.php" target="_top">Report</a></td>';
					echo '</tr>';
					
			}
		 }
				
			}
			return;
		}

		public function getAlerts2(){
			$sql = "SELECT fullName,Address,image,description,phoneNumber,Status FROM missing_persons WHERE alert = 'post'";
			
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr style="1px solid #000">';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Status'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['fullName'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['Address'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;"><img src="Uploads/missing_persons/'.$row['image'].'"/></td>';
					echo '<td style="padding:10px;border:1px solid #000;">'.$row['description'].'</td>';
					echo '<td style="padding:10px;border:1px solid #000;">0'.$row['phoneNumber'].'</td>';
					
					if($row['Status'] == 'Not Found'){
					echo '<td style="padding:10px;border:1px solid #000;"><a target="_top" href="report.php">Report</a></td>';
					}
					else{
						echo '<td style="padding:10px;border:1px solid #000;">No action</td>';
					}
					echo '</tr>';
					
			}
		 }
				
			}
			return;
		}
		
	}

	$db_conn = new pdo_database();

?>