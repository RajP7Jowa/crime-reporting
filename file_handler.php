<?php
	require 'php/classes/db.php';
	require 'php/functions/general.php';
	
	if(isset($_POST['regist']) && !empty($_POST)){
		$result =  $db_conn -> register($_POST);
		
		if($result){
			$results =  $db_conn -> register_person($_POST);
			
			if($results){
				header('Location:success2.php');
			}
		}
	 }
	
	 if(isset($_POST['missing_person']) && !empty($_POST) && !empty($_FILES)){
        if(!empty($_POST)){
          // Sanitise POST array
    
        //files processing
        if ($_FILES){
           //cover_image processing
           $file_name = $_FILES['missing_image']['name'];
           $file_size = $_FILES['missing_image']['size'];
           $file_tmp_name = $_FILES['missing_image']['tmp_name'];

          //Determine filetype
          switch ($_FILES['missing_image']['type']){
               case 'image/jpeg': 
                   $ext = "jpg"; 
                   break;
                    
               case 'image/png': 
                   $ext = "png"; 
                   break;
                    
               default: 
                   $ext = ''; 
                   break;
          }
        
          if ($ext){
		  
          	
                    //Check filesize
             if ($file_size < 1000000){
               $name = "$file_name";
               $name = ereg_replace("[^A-Za-z0-9.]", "", $name);
               $name = strtolower($name);
               $name = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_persons\\$name";
               $new = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_persons\\_".$file_name;
			   
              move_uploaded_file($file_tmp_name, $name);
             
                        
               $results_image = resize_image($name,$new, 150, 200,$ext);
               
               if(!$results_image){
                   echo "Picture not uploaded try again";
				   $form_complete = false;
               }
               else{
                  if (file_exists($name)){
                  	
                        unlink($name);
					  
                	$data = array(
                        	'fullName' => $_POST['full_names'],
                        	'Address' => $_POST['address'],
                        	'phoneNumber' => $_POST['phone_number'],
                        	'Description' => $_POST['last_seen2'],
                        	'Image' => "_".$file_name
                    );
               
                $success = $db_conn -> set_missing_person($data);
             
             	if($success){
                 		header('Location: success.php');
             		}
	      
				else{
						echo "Form not complete";
						die();
					}
                 }
				
               }
             }
            else{
                  echo "Sorry, your file is too large. Try again.";
              }       
           } 
          else{
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." ; 
             }
          } 
            
		
       }
            
    }

	if(isset($_POST['missing_person_found']) && !empty($_POST) && !empty($_FILES)){
        if(!empty($_POST)){
          // Sanitise POST array
    
        //files processing
        if ($_FILES){
           //cover_image processing
           $file_name = $_FILES['found_image']['name'];
           $file_size = $_FILES['found_image']['size'];
           $file_tmp_name = $_FILES['found_image']['tmp_name'];

          //Determine filetype
          switch ($_FILES['found_image']['type']){
               case 'image/jpeg': 
                   $ext = "jpg"; 
                   break;
                    
               case 'image/png': 
                   $ext = "png"; 
                   break;
                    
               default: 
                   $ext = ''; 
                   break;
          }
        
          if ($ext){
		  
          	
                    //Check filesize
             if ($file_size < 1000000){
               $name = "$file_name";
               $name = ereg_replace("[^A-Za-z0-9.]", "", $name);
               $name = strtolower($name);
               $name = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_persons\\$name";
               $new = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_persons\\_".$file_name;
			   
              move_uploaded_file($file_tmp_name, $name);
             
                        
               $results_image = resize_image($name,$new, 150, 200,$ext);
               
               if(!$results_image){
                   echo "Picture not uploaded try again";
				   $form_complete = false;
               }
               else{
                  if (file_exists($name)){
                        unlink($name);
                $success = $db_conn -> set_missing_person_found($_POST['full_names1']);
             
             	if($success){
                 		header('Location: success.php');
             		}
	      
				else{
						header('Location:error.php');
					}
                 }
				
               }
             }
            else{
                  echo "Sorry, your file is too large. Try again.";
              }       
           } 
          else{
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." ; 
             }
          } 
            
		
       }
            
    }

 if(isset($_POST['m_vehicle_submit']) && !empty($_POST) && !empty($_FILES)){
	 
        if(!empty($_POST)){
          // Sanitise POST array
    
        //files processing
        if ($_FILES){
           //cover_image processing
           $file_name = $_FILES['missing_vehicle_image']['name'];
           $file_size = $_FILES['missing_vehicle_image']['size'];
           $file_tmp_name = $_FILES['missing_vehicle_image']['tmp_name'];

          //Determine filetype
          switch ($_FILES['missing_vehicle_image']['type']){
               case 'image/jpeg': 
                   $ext = "jpg"; 
                   break;
                    
               case 'image/png': 
                   $ext = "png"; 
                   break;
                    
               default: 
                   $ext = ''; 
                   break;
          }
        
          if ($ext){
		  
          	
                    //Check filesize
             if ($file_size < 1000000){
               $name = "$file_name";
               $name = ereg_replace("[^A-Za-z0-9.]", "", $name);
               $name = strtolower($name);
               $name = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_vehicles\\$name";
               $new = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_vehicles\\_".$file_name;
			   
              move_uploaded_file($file_tmp_name, $name);
             
                        
               $results_image = resize_image($name,$new, 150, 200,$ext);
               
               if(!$results_image){
                   echo "Picture not uploaded try again";
				   $form_complete = false;
               }
               else{
                  if (file_exists($name)){
                        unlink($name);
					  
                	$data = array(
                        	'Number_plate' => $_POST['number_plate'],
                        	'Model'        => $_POST['model'],
                        	'Owner'        => $_POST['owner_names'],
                        	'phoneNumber'  => $_POST['phone_number1'],
                        	'national_id'  => $_POST['id_number_o'],
                        	'description'  => $_POST['vehicle_description'],
                        	'image'        => "_".$file_name
                    );
               
                $success = $db_conn -> set_missing_vehicle($data);
             
             	if($success){
                 		header('Location: success.php');
             		}
	      
				else{
						echo "Database access denied";
					}
                 }
				
               }
             }
            else{
                  echo "Sorry, your file is too large. Try again.";
              }       
           } 
          else{
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." ; 
             }
          } 
            
		
       }
            
    }

if(isset($_POST['f_vehicle_submit']) && !empty($_POST) && !empty($_FILES)){
	 
        if(!empty($_POST)){
          // Sanitise POST array
    
        //files processing
        if ($_FILES){
           //cover_image processing
           $file_name = $_FILES['f_vehicle_image']['name'];
           $file_size = $_FILES['f_vehicle_image']['size'];
           $file_tmp_name = $_FILES['f_vehicle_image']['tmp_name'];

          //Determine filetype
          switch ($_FILES['f_vehicle_image']['type']){
               case 'image/jpeg': 
                   $ext = "jpg"; 
                   break;
                    
               case 'image/png': 
                   $ext = "png"; 
                   break;
                    
               default: 
                   $ext = ''; 
                   break;
          }
        
          if ($ext){
		  
          	
                    //Check filesize
             if ($file_size < 1000000){
               $name = "$file_name";
               $name = ereg_replace("[^A-Za-z0-9.]", "", $name);
               $name = strtolower($name);
               $name = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_vehicles\\$name";
               $new = "C:\\xampp\\htdocs\\policeStation\\Uploads\\missing_vehicles\\_".$file_name;
			   
              move_uploaded_file($file_tmp_name, $name);
             
                        
               $results_image = resize_image($name,$new, 150, 200,$ext);
               
               if(!$results_image){
                   echo "Picture not uploaded try again";
				   $form_complete = false;
               }
               else{
                  if (file_exists($name)){
                        unlink($name);
					  
                	$data = array(
                        	'Number_plate' => $_POST['number_plate2'],
                        	'Model'        => $_POST['model2'],
                        	'location_seen' => $_POST['location_seen'],
                        	'phoneNumber'  => $_POST['phone_number2'],
                        	'national_id'  => $_POST['id_number2'],
                        	'description'  => $_POST['vehicle_description2'],
                        	'image'        => "_".$file_name
                    );
               
                $success = $db_conn -> set_missing_vehicle_found($data);
             
             	if($success){
                 		header('Location: success.php');
             		}
	      
				else{
						echo "Database access denied";
					}
                 }
				
               }
             }
            else{
                  echo "Sorry, your file is too large. Try again.";
              }       
           } 
          else{
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." ; 
             }
          } 
            
		
       }
            
    }
?>